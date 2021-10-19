<?php

namespace App\Actions\Order;

use App\Actions\baseAction;
use Lorisleiva\Actions\Concerns\AsAction;

/**
 * @property string merchant example "1029864349"
 * @property string created_at example "Wed Jun 30 2021 12:16:25 GMT+030"
 * @property string event example "customer.updated"
 * @property array data @see https://docs.salla.dev/docs/merchent/openapi.json/components/schemas/CustomersWebhookResponse
 */
class Updated extends baseAction
{
    use AsAction;

    public function handle()
    {
        // you can do whatever you want
    }
}
