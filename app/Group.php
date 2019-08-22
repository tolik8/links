<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
 */
class Group extends Model
{
    protected $fillable = ['name', 'parent_id', 'user_id', 'access_id'];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function getBreadcrumb($id)
    {
        $parent = self::where('id', $id)->first()->parent_id;
        dd(123);
        dd($parent);

        /*while ($id !== 0) {

        }*/
    }

    /*public function children() {
        return $this->hasMany('Group','parent_id');
    }*/
    
}
