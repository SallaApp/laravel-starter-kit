<?php

namespace App\Actions\App;

use Lorisleiva\Actions\Concerns\AsAction;

/**
 * Once the app installed on the merchant.
 *
 * @example
 * {
 *    "event": "app.installed",
 *    "merchant": 1234509876,
 *    "created_at": "Wed Jun 30 2021 14:32:33 GMT+0300",
 *    "data": {
 *      "id": 6789012345,
 *      "app_name": "Shipping app",
 *      "description": "App Description"
 *      "app_type": "app",
 *      "app_scopes": [
 *        "settings.read",
 *        "customers.read_write",
 *        "orders.read_write",
 *        "carts.read"
 *      ],
 *      "installation_date": "2021-09-28 06:06:56"
 *    }
 *  }
 */
class Installed
{
    use AsAction;

    public function handle($event)
    {
        // you can do whatever you want by $event
    }
}
