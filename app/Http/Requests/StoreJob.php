<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJob extends FormRequest
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
            'sname' => 'required|alpha',
            'rname' => 'required|alpha',
            'sdate' => 'required|date_format:Y-m-d|after_or_equal:today',
            'edate' => 'required|date_format:Y-m-d|after:sdate',
            'msg' => 'required|string',
            'intervalInput' => 'required|integer|min:1',
            'intervalType' => 'required|alpha',
            'startTime' => 'required|date_format:H:i',
            'type' => 'alpha',
            'email' => 'sometimes|required|email',
            'number' => 'sometimes|required|integer',
            'url' => 'sometimes|required|url'
        ];
    }
}
