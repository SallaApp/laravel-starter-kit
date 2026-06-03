<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Symfony\Component\HttpFoundation\Response;

class NgrokMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! app()->isLocal()) {
            return $next($request);
        }

        $host = $this->extractOriginalHost($request);
        $scheme = $this->extractOriginalScheme($request);

        if (! $this->isNgrokHost($host)) {
            return $next($request);
        }

        if ($scheme === 'http') {
            return redirect()->secure($request->getRequestUri());
        }

        $urlGenerator = app()->make('url');
        $urlGenerator->forceScheme($scheme);
        $urlGenerator->forceRootUrl($scheme.'://'.$host);

        Paginator::currentPathResolver(function () use ($urlGenerator, $request) {
            return $urlGenerator->to($request->path());
        });

        return $next($request);
    }

    private function extractOriginalScheme(Request $request): string
    {
        return $request->hasHeader('x-forwarded-proto')
            ? $request->header('x-forwarded-proto')
            : $request->getScheme();
    }

    private function extractOriginalHost(Request $request): string
    {
        return $request->hasHeader('x-original-host')
            ? $request->header('x-original-host')
            : $request->getHost();
    }

    private function isNgrokHost(string $host): bool
    {
        return (bool) preg_match('/(.*)\.ngrok\.io$/i', $host);
    }
}
