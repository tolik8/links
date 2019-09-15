<?php

namespace App\Services;

use App\Group;
use App\TypeAccess;
use Auth;

class CreateItemsService
{
    public function create(array $baseData, $group)
    {
        $data = [
            'group' => $group,
            'types' => TypeAccess::all(),
        ];

        if ($group === null) {
            $data['type_access'] = Auth::user()->type_access_id;
        } else {
            $data['type_access'] = Auth::user()->groups()->where('id', $group)->first()->access_id;
            $data['breadcrumb'] = Group::getBreadcrumb($group);
        }

        return array_merge($baseData, $data);
    }

}
