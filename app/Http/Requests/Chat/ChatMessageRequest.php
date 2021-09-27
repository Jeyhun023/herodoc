<?php

namespace App\Http\Requests\Chat;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\ChatUser;

class ChatMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $this->merge([
            'id' => $this->route('chat'),
            'user_id' => auth()->user()->id
        ]);
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
            'content' => ['required'],
            'id' => ['required', Rule::exists('chat_users')->where(function ($query) {
                $query->where('user_id_from', $this->user_id);
                $query->orWhere('user_id_to', $this->user_id);
            })]
        ];
    }

    public function messages()
    {
        return [
            'id.exists' => 'İcazəniz yoxdur'
        ];
    }
}
