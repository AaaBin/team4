<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property int $customer_id
 * @property int $total_number
 * @property int $vegetarian_number
 * @property string $date
 * @property string $time
 * @property string $price
 * @property string $remark
 * @property string $created_at
 * @property string $updated_at
 */
class Restaurant extends Model
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
    protected $fillable = ['customer_id', 'total_number', 'vegetarian_number', 'guide_need', 'date', 'time', 'time_session', 'price', 'remark', 'created_at', 'updated_at','payment_condition'];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

}
