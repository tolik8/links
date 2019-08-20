<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Group;
use App\TypeAccess;
use App\User;

class IndexController extends MainController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (!Auth::user()) {
            return $this->index_not_auth();
        }

        return $this->index_auth();
    }

    public function index_auth()
    {
        $data = $this->data;

        $data['groups'] = Group::where('parent_id', 0)->get();
        foreach ($data['groups'] as $group) {
            switch ($group->access_id) {
                case 2:
                    $group->setAttribute('icon', '<i class="fas fa-user-friends"></i>');
                    break;
                case 3:
                    $group->setAttribute('icon', '<i class="fas fa-lock"></i>');
                    break;
            }

        }

        return view($this->theme() . '.index_auth', $data);
    }

    public function index_not_auth()
    {
        return view($this->theme() . '.index_not_auth', $this->data);
    }

}
