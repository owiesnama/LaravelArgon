<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileForm;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * ProfileController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = \Auth::user()->load('profile');

        $user->addHidden('github_id');

        return view('profile',compact('user'));
    }

    /**
     * Update the user profile info
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update($user = null,ProfileForm $profileForm)
    {
        $profile = $profileForm->persist();

        if ($profileForm->expectsJson()){
            return response($profile,200);
        }

        return back();
    }

}
