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
            'edate' => 'required|date_format:Y-m-d|after_or_equal:sdate',
            'msg' => 'sometimes|required|string',
            'intervalInput' => 'required|integer|min:1',
            'intervalType' => 'required|alpha',
            'startTime' => 'required|date_multi_format:"H:i:s","H:i"',
            'etime' => 'required|date_multi_format:"H:i:s","H:i"',
            'type' => 'required|alpha',
            'email' => 'sometimes|required|email',
            'number' => 'sometimes|required|integer',
            'url' => 'sometimes|required|url',
            'key' => 'sometimes|required|string',
            'value' => 'sometimes|required|string'
        ];
    }

    public function messages(){
        return [
            'date_multi_format' => 'Time must be formatted either h:m or h:m:s'
        ];
    }
}
