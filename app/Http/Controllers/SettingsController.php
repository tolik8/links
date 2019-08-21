<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypeAccess;
use App\Http\Requests\TypeAccessRequest;
use Illuminate\Support\Facades\Auth;
use App\User;

class SettingsController extends MainController
{
    public function index()
    {
        $this->data['types'] = TypeAccess::all();
        $this->data['type_access'] = User::getTypeAccess();

        return view($this->theme() . '.settings', $this->data);
    }

    public function save(TypeAccessRequest $request)
    {
        if ($request->validated()) {
            $user = User::find(Auth::user()->id);
            $user->type_access_id = $request->get('type_access_id');

            if ($user->save()) {
                return redirect('settings')->with('status', __('main.settings_saved'));
            }
        }

        return redirect('settings');
    }

}
