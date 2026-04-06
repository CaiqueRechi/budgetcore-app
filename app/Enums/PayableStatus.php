<?php

namespace App\Enums;

enum PayableStatus: int
{
    case Pending = 0;
    case Paid = 1;

    public function label(): string
    {
        return match ($this) {
            self::Pending => 'Pendente',
            self::Paid => 'Pago',
        };
    }
}
