<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionsController extends MainController
{
    /*public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }*/

    public function index()
    {
        return view($this->theme() . '.subscriptions', $this->data);
    }

}
