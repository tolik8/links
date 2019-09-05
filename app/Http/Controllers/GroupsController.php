<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Http\Requests\GroupRequest;
use Auth;
use App\TypeAccess;

class GroupsController extends MainController
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
        return view($this->theme() . '.groups.create', $data);
    }

    public function store(GroupRequest $request)
    {
        $data = $request->validated();
        $data['parent_id'] = $request->group;
        $data['user_id'] = Auth::user()->id;

        $result = Group::create($data);

        if (!is_object($result)) {
            return redirect()->route('groups.create');
        }

        return redirect()->route('group', ['group' => $request->group])
            ->with('status', __('groups.group_created'));
    }

    public function edit(Group $group)
    {
        $this->authorize('group-edit', $group);

        $data = [
            'group' => $group,
            'types' => TypeAccess::all(),
            'breadcrumb' => Group::getBreadcrumb($group->id),
        ];

        $data = array_merge($this->data, $data);
        return view($this->theme() . '.groups.edit', $data);
    }

    public function update(GroupRequest $request, Group $group)
    {
        //dd($request);
        $this->authorize('group-edit', $group);

        $result = $group->fill($request->validated())->save();

        if (!$result) {
            return redirect()->route('groups.edit', ['group' => $group]);
        }

        return redirect()->route('group', ['group' => $request->group])
            ->with('status', __('groups.group_edited'));
    }

    public function destroy(Group $group)
    {
        $this->authorize('group-edit', $group);

        try {
            $group->delete();
        } catch (\Exception $e) {

        }

        return redirect()->route('group', ['group_id' => $group->parent_id]);
    }

}
