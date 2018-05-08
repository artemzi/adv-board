<?php

namespace Board\Http\Requests\Admin\Users;

use Board\User;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property User $user
 */
class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,id,' . $this->user->id,
        ];
    }
}
