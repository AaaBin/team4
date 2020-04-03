<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property int $customer_id
 * @property string $adult
 * @property string $child
 * @property string $check_in_date
 * @property string $striking_camp_date
 * @property string $campsite_type
 * @property string $equipment_need
 * @property string $price
 * @property string $remark
 * @property string $created_at
 * @property string $updated_at
 */
class Camp extends Model
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
    protected $fillable = ['customer_id', 'adult', 'child', 'check_in_date', 'striking_camp_date', 'campsite_type', 'equipment_need', 'price', 'remark', 'created_at', 'updated_at','payment_condition'];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
