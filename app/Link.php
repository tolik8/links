<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Link
 *
 * @property int $id
 * @property string $name Name
 * @property string $description Description
 * @property string $link Link
 * @property string $image Image
 * @property int $user_id User ID
 * @property int $access_id Access ID
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property mixed group_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Link newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Link newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Link query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Link whereAccessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Link whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Link whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Link whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Link whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Link whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Link whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Link whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Link whereUserId($value)
 * @mixin \Eloquent
 * @property int|null $group_id Group ID
 * @property-read \App\Group|null $group
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tag[] $tags
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Link whereGroupId($value)
 */
class Link extends Model
{
    protected $fillable = ['name', 'link', 'description', 'group_id', 'user_id', 'access_id'];

    public function tags()
    {
        return $this->hasMany('App\Tag');
    }

    public function group()
    {
        return $this->belongsTo('App\Group', 'group_id');
    }

}
