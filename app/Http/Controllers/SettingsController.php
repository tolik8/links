<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\TypeAccess;

class SettingsController extends MainController
{
    /*public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }*/

    public function index()
    {
        $this->data['types'] = TypeAccess::all();
        //$type = User::get('type_access_id');
        //dd($type);
        //dd($user);

        //$type_access_id = Auth::user()->type_access_id;


        //dd($user);

        $type = User::getTypeAccess();
        dd($type);


        return view($this->theme() . '.settings', $this->data);
    }

    public function save(Request $request)
    {
        dump($request);
    }

}
