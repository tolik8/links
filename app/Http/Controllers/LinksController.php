<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\LinkRequest;
//use Illuminate\Http\Request;
use App\Link;
use App\Services\CreateItemsService;
use App\TypeAccess;
use Auth;

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

        if ($request->group_id) {
            return redirect()->route('group', ['group' => $request->group])
                ->with('alert-success', __('links.link_created'));
        }

        return redirect()->route('index')
            ->with('alert-success', __('links.link_created'));
    }

    public function edit(Link $link)
    {
        $data = [
            'link' => $link,
            'group' => Group::find($link->group_id),
            'types' => TypeAccess::all(),
            'breadcrumb' => Group::getBreadcrumb($link->group_id),
        ];
        dd(old('name'));

        $data = array_merge($this->data, $data);
        return view($this->theme() . '.links.edit', $data);
    }

    public function update(LinkRequest $request, Link $link)
    {
        $this->authorize('link-edit', $link);

        $result = $link->fill($request->validated())->save();

        if (!$result) {
            return redirect()->route('links.edit', ['link' => $link]);
        }

        if ($link->group_id) {
            return redirect()->route('group', ['group' => $link->group_id])
                ->with('alert-success', __('links.link_edited'));
        }

        return redirect()->route('index')
                ->with('alert-success', __('links.link_edited'));
    }

    public function destroy(Link $link)
    {
        $this->authorize('link-edit', $link);

        try {
            $link->delete();
        } catch (\Exception $e) {

        }

        if ($link->group_id) {
            return redirect()->route('group', ['group' => $link->group_id])
                ->with('alert-success', __('links.link_deleted'));
        }

        return redirect()->route('index')
            ->with('alert-success', __('links.link_deleted'));
    }
}
