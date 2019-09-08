<?php

namespace App\Http\Controllers;

use Cookie;

class MainController extends Controller
{
    protected $data;

    public function __construct()
    {
        $this->data = [
            'theme'  => $this->theme(),
        ];

        if (Cookie::get('show_edit_elements') === 'false') {
            $this->data['d_none'] = 'd-none';
        } else {
            $this->data['d_none'] = '';
        }
    }

    public function theme()
    {
        return env('THEME');
    }

}
