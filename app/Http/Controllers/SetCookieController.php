<?php

namespace App\Http\Controllers;

use Cookie;

class SetCookieController
{
    public function show_edit_elements($value)
    {
        if ($value === 'true' || $value === 'false') {
            Cookie::queue(Cookie::make('show_edit_elements', $value, 525600));
        }
    }

}
