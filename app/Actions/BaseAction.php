<?php

namespace App\Actions;

use App\Http\Requests\WebhookRequest;
use Lorisleiva\Actions\Concerns\AsAction;

abstract class BaseAction
{
    use AsAction;

    protected WebhookRequest $request;

    public function setRequest(WebhookRequest $request): static
    {
        $this->request = $request;

        return $this;
    }

    public function __get(string $name): mixed
    {
        return $this->request->get($name);
    }
}
