<?php

namespace App\Http\Requests;

use App\Profile;
use Illuminate\Foundation\Http\FormRequest;

class ProfileForm extends FormRequest
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
            'bio'=> 'required'
        ];
    }

    public function persist($user = null)
    {
        if ($user) {
            $user = Profile::where('user_id', \Auth::id())
                ->update($this->except(['_token','_method','name','email']));
            return $user;
        }

        $user = Profile::where('user_id', \Auth::id())
            ->update($this->except(['_token','_method','name','email']));

        return $user;
    }
}
