<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Group;
use App\TypeAccess;

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
        $this->middleware ('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
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

        return view($this->theme() . '.home', $data);
    }

    public function settings()
    {
        $this->data['types'] = TypeAccess::all();

        return view($this->theme() . '.settings', $this->data);
    }

    public function settingsSave(Request $request)
    {
        session(['access_id' => $request->access_id]);
        return redirect()->route('index')->with('status', 'Access changed');
    }

}
