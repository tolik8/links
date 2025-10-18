<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    protected $data;

    public function __construct()
    {
        $this->data = [
            'theme' =>  $this->theme(),
        ];
    }

    public function theme()
    {
        return env('THEME');
    }

}
