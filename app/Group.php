<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * App\Group
 *
 * @property int $id ID
 * @property string $name Name
 * @property int $parent_id Parent ID
 * @property int $user_id User ID
 * @property int $access_id Access ID
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereAccessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereUserId($value)
 * @mixin \Eloquent
 * @property-read \App\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Group[] $children
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Link[] $links
 * @property-read \App\Group|null $parent
 */
class Group extends Model
{
    protected $fillable = ['name', 'parent_id', 'user_id', 'access_id'];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function links()
    {
        return $this->hasMany('App\Link');
    }

    public static function getBreadcrumb($id)
    {
        if ($id === null) {
            return collect();
        }

        $user_id = Auth::user()->id;
        $breadcrumb = collect();
        $i = 0;

        while ($id !== null && $i < 10) {
            $element = self::where('id', $id)->where('user_id', $user_id)->get();

            if ($element->isNotEmpty()) {
                $id = $element->first()->parent_id;
                $breadcrumb = $breadcrumb->merge($element);
            } else {
                abort(403);
            }
            $i++;
        }

        return $breadcrumb->reverse();
    }

    public function children() {
        return $this->hasMany('App\Group', 'parent_id');
    }

    public function parent() {
        return $this->belongsTo('App\Group', 'parent_id');
    }

    public function allowDestroy() {
        $children = $this->children()->get()->count();
        $links = $this->links()->get()->count();

        return $children === 0 && $links === 0;
    }
    
}
