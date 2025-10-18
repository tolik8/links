<?php

namespace App\Http\Controllers;

use Arr;
use Config;
use Cookie;

class LocaleController extends Controller
{
    public function setLocale($language)
    {
        if (Arr::has(Config::get('app.locales'), $language)) {
            Cookie::queue(Cookie::forget('language'));
            Cookie::queue(Cookie::make('language', $language, 525600)); // 60*24*365 = 1 year
        }
        return back();
    }

}
