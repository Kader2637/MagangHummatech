<?php

namespace App\Models;

use App\Base\Interfaces\HasCourse;
use App\Base\Interfaces\HasProduct;
use App\Base\Interfaces\HasUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model implements HasUser, HasProduct, HasCourse
{
    use HasFactory;
    protected $table = 'transactions';
    protected $primaryKey = 'id';
    protected $fillable = [
        'reference',
        'merchant_ref',
        'payment_method',
        'payment_name',
        'user_id',
        'callback_url',
        'return_url',
        'pay_code',
        'pay_url',
        'product_id',
        'course_id',
        'amount',
        'total_fee',
        'status',
        'expired_time',
    ];

    protected $guarded = [];

    /**
     * product
     *
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * course
     *
     * @return BelongsTo
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * user
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
