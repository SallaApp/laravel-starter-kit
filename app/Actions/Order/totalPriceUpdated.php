<?php

namespace App\Actions\Order;

use App\Actions\baseAction;
use Lorisleiva\Actions\Concerns\AsAction;

/**
 * @property string merchant example 674390266
 * @property string created_at example "2021-06-02 22:17:06"
 * @property string event example "order.total.price.updated"
 * @property array data @see https://docs.salla.dev/docs/merchent/openapi.json/components/schemas/OrdersUpdateWebhookResponse
 */
class totalPriceUpdated extends baseAction
{
    use AsAction;

    public function handle()
    {
        // you can do whatever you want
    }
}
