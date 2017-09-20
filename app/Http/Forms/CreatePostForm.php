<?php

namespace App\Http\Forms;

use App\Exceptions\ThrottleException;
use App\Reply;
use Illuminate\Foundation\Http\FormRequest;
use App\Thread;

class CreatePostForm extends FormRequest
{
    protected function failedAuthorization()
    {
        throw new ThrottleException('Too fast son');
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Gate::allows('create',new Reply);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'body' => 'required|spamfree'
        ];
    }
}
