<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\LinkRequest;
use App\Link;
use App\TypeAccess;
use Auth;
use Illuminate\Http\Request;

class LinksController extends MainController
{
    public function create($group = 0)
    {
        $group = (int)$group;
        $data = [
            'group' => $group,
            'types' => TypeAccess::all(),
        ];

        if ($group === 0) {
            $data['type_access'] = Auth::user()->type_access_id;
        } else {
            $data['type_access'] = Auth::user()->groups()->where('id', $group)->first()->access_id;
            $data['breadcrumb'] = Group::getBreadcrumb($group);
        }

        $data = array_merge($this->data, $data);
        return view($this->theme() . '.links.create', $data);
    }

    public function store(LinkRequest $request)
    {
        $data = $request->validated();
        $data['group_id'] = $request->group;
        $data['user_id'] = Auth::user()->id;

        $result = Link::create($data);

        if (!is_object($result)) {
            return redirect()->route('links.create');
        }

        return redirect()->route('group', ['group' => $request->group])
            ->with('status', __('links.link_created'));
    }

    public function edit($id)
    {
        $data = [];

        $data = array_merge($this->data, $data);
        return view($this->theme() . '.links.edit', $data);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
