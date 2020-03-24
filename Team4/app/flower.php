<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $date
 * @property string $title
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 */
class flower extends Model
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
    protected $fillable = [ "date_y", 'date_m', 'date_d',  'title', 'content', 'created_at', 'updated_at'];

}
