<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $img_url
 * @property int $sort
 * @property string $created_at
 * @property string $updated_at
 */
class Ig_img extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['img_url', 'sort', 'created_at', 'updated_at'];

}
