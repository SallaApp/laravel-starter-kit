<?php

namespace App\Actions\Order;

use Lorisleiva\Actions\Concerns\AsAction;

/**
 * @property string merchant example "674390266"
 * @property string created_at example "2021-06-02 22:17:06"
 * @property string event example "order.shipment.return.created"
 * @property array data @see https://docs.salla.dev/docs/merchent/c2NoOjE4OTY4ODg3-order-shipment-return-created
 */
class shipmentReturnCreated extends baseAction
{
    use AsAction;

    public function handle()
    {
        // you can do whatever you want
    }
}
