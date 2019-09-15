<?php

namespace App\Http\Controllers;

use App\Group;
use App\Link;
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends MainController
{
    public function index($group = null)
    {
        if (!Auth::user()) {
            return $this->indexNotAuth();
        }

        return $this->indexAuth($group);
    }

    public function indexAuth($group = null)
    {
        $data = $this->data;
        $data['group'] = $group;

        if ($group !== null) {
            $data['breadcrumb'] = Group::getBreadcrumb($group);
        }

        $data['links'] = Link::where('user_id', Auth::user()->id)
            ->where('group_id', $group)->get();

        $data['groups'] = Auth::user()->groups()->where('parent_id', $group)->get();

        foreach ($data['groups'] as $item) {
            switch ($item->access_id) {
                case 2:
                    $item->setAttribute('icon', '<i class="fas fa-user-friends"></i>');
                    break;
                case 3:
                    $item->setAttribute('icon', '<i class="fas fa-lock"></i>');
                    break;
            }
        }

        return view($this->theme() . '.index_auth', $data);
    }

    public function indexNotAuth()
    {
        return view($this->theme() . '.index_not_auth', $this->data);
    }

    public function redirectToIndex()
    {
        return redirect()->route('index');
    }

}
