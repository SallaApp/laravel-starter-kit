<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebhookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->header('Authorization') === config('services.salla.webhook_secret');
    }

    public function rules(): array
    {
        return [
            'event' => ['required'],
            'merchant' => ['required'],
            'data' => ['required'],
        ];
    }
}
