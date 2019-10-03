<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Tag
 *
 * @property int $link_id Link ID
 * @property string $name Name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Link $link
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag whereLinkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tag extends Model
{
    protected $fillable = ['link_id', 'name'];

    public function link()
    {
        return $this->belongsTo('App\Link', 'link_id');
    }

    public static function insertTags($link_id, $tags_string)
    {
        if (!$link_id || trim($tags_string) === '') {exit;}

        $tags = explode(',', $tags_string);
        $tags = array_map('trim', $tags);
        $tags = array_unique($tags);

        foreach ($tags as $tag) {
            if ($tag !== '') {
                $data= [
                    'link_id' => $link_id,
                    'name' => $tag,
                ];
                self::create($data);
            }
        }
    }

    public static function updateTags(Link $link, $tags_string)
    {
        $link->tags()->delete();
        self::insertTags($link->id, $tags_string);
    }

}
