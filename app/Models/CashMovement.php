<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashMovement extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cash_account_id',
        'type',
        'amount',
        'description',
        'movement_date',
        'reference_type',
        'reference_id',
        'notes',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'movement_date' => 'date',
    ];

    public const TYPE_INCOME = 'income';
    public const TYPE_EXPENSE = 'expense';
    public const TYPE_TRANSFER_IN = 'transfer_in';
    public const TYPE_TRANSFER_OUT = 'transfer_out';
    public const TYPE_ADJUSTMENT = 'adjustment';

    public static function types(): array
    {
        return [
            self::TYPE_INCOME,
            self::TYPE_EXPENSE,
            self::TYPE_TRANSFER_IN,
            self::TYPE_TRANSFER_OUT,
            self::TYPE_ADJUSTMENT,
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cashAccount()
    {
        return $this->belongsTo(CashAccount::class);
    }
}
