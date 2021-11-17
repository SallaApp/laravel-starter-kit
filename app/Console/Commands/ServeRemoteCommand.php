<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class ServeRemoteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'serve.remote
                            {--port= : The port to share}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Share the application with ngrok';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $port = $this->option('port') ? : '8000';

        $command = ['ngrok', 'http', '--log', 'stdout'];
        $command[] = $port;

        $process = new Process($command, null, null, null, null);
        $process->start();

        $webhook_url = route('webhook', [], false);
        $callback_url = route('oauth.callback', [], false);

        foreach ($process as $type => $data) {

            if (preg_match('/msg="starting web service".*? addr=(?<addr>\S+)/', $data, $matches)) {
                $this->line('<fg=green>Ngrok Web Interface: </fg=green>'.'http://'.$matches['addr']);
            }

            if (preg_match('/msg="started tunnel".*? addr=(?<addr>\S+)/', $data, $matches)) {
                $this->line('<fg=green>Local Web Interface: </fg=green>'.$matches['addr']);
            }

            if (preg_match_all('/msg="started tunnel".*? url=(?<url>\S+)/m', $data, $matches)) {
                $this->line('<fg=green>Remote Web Interface: </fg=green>'.implode(' , ', $matches['url']));
                $webhook_urls = implode(' , ', array_map(function ($url) use ($webhook_url) {
                    return $url.$webhook_url;
                }, $matches['url']));
                $this->line('<fg=green>Webhook URL: </fg=green>'.$webhook_urls);
                $callback_urls = implode(' , ', array_map(function ($url) use ($callback_url) {
                    return $url.$callback_url;
                }, $matches['url']));
                $this->line('<fg=green>OAuth Callback URL: </fg=green>'.$callback_urls);
            }


            if ($process::OUT === $type) {
                $this->line($data, null, 'vv');
            } else {
                $this->warn("error :- ".$data);
            }
        }

        $this->call('serve', [
            '--port' => $port
        ]);

        return 0;
    }
}
