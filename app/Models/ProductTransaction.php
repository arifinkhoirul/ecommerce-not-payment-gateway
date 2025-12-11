<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductTransaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'user_id',
        'phone',
        'email',
        'address',
        'city',
        'post_code',
        'booking_trx_id',

        'shoe_id',

        'shoe_size',
        'quantity',
        'sub_total_amount',

        'promo_code_id',

        'discount_amount',
        'grand_total_amount',
        'is_paid',
        'proof',
        'user_id'
    ];


    public static function generatedUniqueTrxId()
    {
        $prefix = 'ECOMIRL';

        do {
            $randomString = $prefix . mt_rand(1000, 9999);
        } while (self::where('booking_trx_id', $randomString)->exists());

        return $randomString;
    }

    public function shoe()
    {
        return $this->belongsTo(Shoe::class, 'shoe_id');
    }

    public function promoCode()
    {
        return $this->belongsTo(PromoCode::class, 'promo_code_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
