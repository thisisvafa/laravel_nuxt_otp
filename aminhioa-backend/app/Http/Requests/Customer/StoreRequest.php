<?php

namespace App\Http\Requests\Customer;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'          => 'required',
            'last_name'     => 'required',
            'mobile'        => 'required|regex:/(09)[0-9]{9}/|digits:11|numeric|unique:customers',
            'instagram'     => 'nullable',
            'website'       => 'nullable',
            'country'       => 'required',
            'city'          => 'required',
            'other_number'  => 'nullable|numeric',
            'description'   => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'فیلد نام اجباری است.',
            'last_name.required'    => 'فیلد نام خانوادگی اجباری است.',
            'mobile.required'       => 'فیلد شماره همراه اجباری است.',
            'mobile.numeric'        => 'فیلد شماره همراه باید بصورت عددی باشد.',
            'mobile.regex'          => 'فیلد شماره همراه خود را به درستی وارد کنید.',
            'mobile.digits'         => 'فیلد شماره همراه 11 رقمی است، لطفا درست وارد کنید.',
            'mobile.unique'         => 'این شماره از قبل ثبت شده است.',
            'country.required'      => 'فیلد کشور اجباری است.',
            'city.required'         => 'فیلد شهر اجباری است.',
            'other_number.numeric'  => 'فیلد شماره دیگر باید بصورت عددی باشد.',
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json([
            "responseCode" => 422,
            'error' => true,
            "message" => 'مشکلی در ارسال اطلاعات پیش آمده است.',
            "errorCode" => config("error_codes.set_advertise_seen_error_code"),
            'errors' => $validator->errors(),
        ], 422));
    }
}
