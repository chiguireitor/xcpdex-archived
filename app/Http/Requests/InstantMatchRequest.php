<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class InstantMatchRequest extends Request
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
     * @return array
     */
    public function rules()
    {
        return [
            'action' => 'required|in:BUY,SELL',
            'asset' => 'required|alpha_num|min:3|max:23',
        ];
    }
}
