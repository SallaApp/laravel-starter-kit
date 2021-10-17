<?php

namespace App\Actions\Order;

use Lorisleiva\Actions\Concerns\AsAction;

/**
 *
 * @example
 * {
 *   "event": "order.created",
 *   "merchant": 674390266,
 *   "created_at": "2021-06-02 22:17:06",
 *   "data": {
 *     "id": 1303591862,
 *     "reference_id": 39187
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
