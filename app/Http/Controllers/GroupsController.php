<?php

namespace App\Http\Controllers;

use App\Services\CreateItemsService;
use Illuminate\Http\Request;
use App\Group;
use App\Http\Requests\GroupRequest;
use Auth;
use App\TypeAccess;

class GroupsController extends MainController
{
    public function create($group = null)
    {
        $data = (new CreateItemsService())->create($this->data, $group);

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
        //dump($errors);

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
            return redirect()->route('groups.edit', ['group' => $group->id])
                ->with('alert-danger', __('groups.group_delete_error'));
        }

        return redirect()->route('group', ['group_id' => $group->parent_id]);
    }

}
