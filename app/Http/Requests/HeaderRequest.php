<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HeaderRequest extends FormRequest
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
            'home_page_title' => 'required',
            'home_page_content' => 'required',
            'about_page_title' => 'required',
            'about_page_content' => 'required',
            'service_page_title' => 'required',
            'service_page_content' => 'required',
            'contact_page_title' => 'required',
            'contact_page_content' => 'required',
            'team_page_title' => 'required',
            'team_page_content' => 'required',
            'lang' => 'required',
        ];
    }
}









