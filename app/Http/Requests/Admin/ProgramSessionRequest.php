<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProgramSessionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'session_date' => ['required', 'date'],
            'start_time' => ['required'],
            'end_time' => ['required'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'session_type' => ['required', 'in:plenary,breakout,exhibition,networking,gala,site_visit,break'],
            'venue_hall' => ['nullable', 'string', 'max:255'],
            'speaker_name' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
        ];
    }
}
