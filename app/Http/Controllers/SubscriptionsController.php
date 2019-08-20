<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionsController extends MainController
{
    public function index()
    {
        return view($this->theme() . '.subscriptions', $this->data);
    }

}
