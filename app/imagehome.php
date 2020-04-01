<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $video_title
 * @property string $youtube_url
 * @property int $sort
 * @property string $created_at
 * @property string $updated_at
 */
class Imagehome extends Model
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
    protected $fillable = ['video_title', 'youtube_url', 'sort', 'created_at', 'updated_at'];

}
