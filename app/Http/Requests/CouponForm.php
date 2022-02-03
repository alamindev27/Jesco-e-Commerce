<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponForm extends FormRequest
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
            'coupon_name' => 'required | unique:coupons',
            'discount_persentence' => 'required | numeric | min: 1 | max: 99',
            'validity' => 'required | date | after:today',
            'limit' => 'required | numeric | min:1'
        ];
    }
}
