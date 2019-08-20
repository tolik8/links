<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\TypeAccess
 *
 * @property int $id ID
 * @property string $name Name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TypeAccess newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TypeAccess newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TypeAccess query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TypeAccess whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TypeAccess whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TypeAccess whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TypeAccess whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TypeAccess extends Model
{
    protected $table = 'type_access';
}
