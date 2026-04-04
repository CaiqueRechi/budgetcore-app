<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'type',
        'description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public const TYPE_CASH = 'cash';
    public const TYPE_BANK = 'bank';
    public const TYPE_DIGITAL_WALLET = 'digital_wallet';

    public static function types(): array
    {
        return [
            self::TYPE_CASH,
            self::TYPE_BANK,
            self::TYPE_DIGITAL_WALLET,
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function movements()
    {
        return $this->hasMany(CashMovement::class);
    }

    public function getBalanceAttribute(): float
    {
        $entries = $this->movements()
            ->whereIn('type', [
                CashMovement::TYPE_INCOME,
                CashMovement::TYPE_TRANSFER_IN,
            ])
            ->sum('amount');

        $exits = $this->movements()
            ->whereIn('type', [
                CashMovement::TYPE_EXPENSE,
                CashMovement::TYPE_TRANSFER_OUT,
            ])
            ->sum('amount');

        $adjustments = $this->movements()
            ->where('type', CashMovement::TYPE_ADJUSTMENT)
            ->sum('amount');

        return (float) ($entries - $exits + $adjustments);
    }
}
