<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ReactionRequest extends FormRequest
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
            'post_id' => 'required|int|exists:posts,id',
            'like'   => 'required|boolean'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $failedRules = $validator->failed();

        if(isset($failedRules['post_id']['Exists'])){
            throw new HttpResponseException(response()->json([
                'status' => 404,
                'message' => 'Model not found',
            ], 404));
        }else{
            throw new HttpResponseException(response()->json([
                'status' => 422,
                'message' => $validator->errors(),
            ], 422));
        }

    }

    public function messages()
    {
        return [
            'post_id.exists' => 'model not found.',
        ];
    }

}
