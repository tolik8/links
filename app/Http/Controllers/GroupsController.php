<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Http\Requests\GroupRequest;
use Auth;
use App\TypeAccess;

class GroupsController extends MainController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($group = 0)
    {
        $group = (int)$group;
        $this->data['group'] = $group;
        $this->data['types'] = TypeAccess::all();

        if ($group === 0) {
            $this->data['type_access'] = Auth::user()->type_access_id;
        } else {
            $this->data['type_access'] = Auth::user()->groups()->where('id', $group)->first()->access_id;
            $this->data['breadcrumb'] = Group::getBreadcrumb($group);
        }

        return view($this->theme() . '.groups.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupRequest $request)
    {
        $data = $request->validated();

        $data['parent_id'] = $request->group;
        $data['user_id'] = Auth::user()->id;

        $result = Group::create($data);

        if (!is_object($result)) {
            return redirect()->route('groups.create');
        }

        return redirect()->route('group', ['group' => $request->group])->with('status', __('main.group_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($group)
    {
        $this->data['group'] = $group;
        $this->data['types'] = TypeAccess::all();

        if ($group === 0) {
            $this->data['type_access'] = Auth::user()->type_access_id;
        } else {
            $this->data['type_access'] = Auth::user()->groups()->where('id', $group)->first()->access_id;
            $this->data['breadcrumb'] = Group::getBreadcrumb($group);
        }

        return view($this->theme() . '.groups.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        try {
            $group->delete();
        } catch (\Exception $e) {

        }

        return redirect()->route('group', ['group_id' => $group->parent_id]);
    }
}
