<?php

namespace App\Services;

use App\Group;
use App\TypeAccess;
use Auth;

class CreateItemsService
{
    public function create(array $baseData, Group $group)
    {
        $data = [
            'group' => $group,
            'types' => TypeAccess::all(),
        ];

        if ($group->id) {
            $data['type_access'] = Auth::user()->groups()->where('id', $group->id)->first()->access_id;
            $data['breadcrumb'] = Group::getBreadcrumb($group->id);
        } else {
            $data['type_access'] = Auth::user()->type_access_id;
        }

        return array_merge($baseData, $data);
    }

}
