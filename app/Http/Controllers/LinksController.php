<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\LinkRequest;
use App\Link;
use App\Services\CreateItemsService;
use App\TypeAccess;
use Auth;
use Illuminate\Http\Request;

class LinksController extends MainController
{
    public function create(Group $group)
    {
        $data = (new CreateItemsService())->create($this->data, $group);

        return view($this->theme() . '.links.create', $data);
    }

    public function store(LinkRequest $request)
    {
        $data = $request->validated();
        $data['group_id'] = $request->group_id;
        $data['user_id'] = Auth::user()->id;

        $result = Link::create($data);

        if (!is_object($result)) {
            return redirect()->route('links.create');
        }

        return redirect()->route('group', ['group' => $request->group])
            ->with('alert-success', __('links.link_created'));
    }

    public function edit(Link $link)
    {
        $data = [
            'link' => $link,
            'group_id' => $link->group->id ?? null,
            'user_id' => Auth::user()->id,
            'types' => TypeAccess::all(),
            'type_access' => $link->access_id,
            'breadcrumb' => Group::getBreadcrumb($link->group_id),
        ];

        //dd($data);
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
