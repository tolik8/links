<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FriendsController extends MainController
{
    public function index()
    {
        return view($this->theme() . '.friends', $this->data);
    }

}
