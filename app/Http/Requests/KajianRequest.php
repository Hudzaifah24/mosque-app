<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KajianRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:100',
            'speaker' => 'required|max:50',
            'desc' => 'required',
            'status' => 'required|in:active,inactive',
            'jam' => 'required',
            'tanggal' => 'required|date'
        ];
    }
}
