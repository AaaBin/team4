<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $created_at
 * @property string $updated_at
 */
class Customer extends Model
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
    protected $fillable = ['name', 'phone', 'email', 'created_at', 'updated_at'];

    public function camp()
    {
        return $this->hasMany('App\Camp');
    }
    public function restaurant()
    {
        return $this->hasMany('App\Restaurant');
    }

}
