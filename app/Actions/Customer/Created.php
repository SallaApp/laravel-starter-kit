<?php

namespace App\Actions\Customer;

use Lorisleiva\Actions\Concerns\AsAction;

/**
 * Once Customer Created at store.
 *
 * @example
 * {
 *   "event": "customer.created",
 *   "merchant": 674390266,
 *   "created_at": "2021-06-02 22:17:06",
 *   "data": {
 *    "id": 2107468057,
 *    "first_name": "Mohammed",
 *    "last_name": "Ali",
 *    "mobile": 512345678,
 *    "mobile_code": "+966",
 *   }
 * }
 */
class Created
{
    use AsAction;

    public function handle($event)
    {
        // you can do whatever you want by $event
    }
}
