<?php

namespace App\Enum;

enum TransactionStatusEnum: string
{
    case PENDING = 'pending';
    case PAID = 'paid';
    case CANCELLED = 'cancelled';
    case EXPIRED = 'expired';
    case FAILED = 'failed';
    case REFUND = 'refund';
    case UNPAID = 'unpaid';

    public function label(): string
    {
        return match ($this) {
            TransactionStatusEnum::PENDING => 'Menunggu Pembayaran',
            TransactionStatusEnum::PAID => 'Lunas',
            TransactionStatusEnum::CANCELLED => 'Batal',
            TransactionStatusEnum::EXPIRED => 'Kadaluarsa',
            TransactionStatusEnum::FAILED => 'Gagal',
            TransactionStatusEnum::REFUND => 'Dikembalikan',
            TransactionStatusEnum::UNPAID => 'Belum lunas',
        };
    }

    public function color(): string
    {
        return match ($this) {
            TransactionStatusEnum::PENDING => 'warning',
            TransactionStatusEnum::PAID => 'success',
            TransactionStatusEnum::CANCELLED => 'danger',
            TransactionStatusEnum::EXPIRED => 'secondary',
            TransactionStatusEnum::FAILED => 'danger',
            TransactionStatusEnum::REFUND => 'info',
            TransactionStatusEnum::UNPAID => 'warning',
        };
    }
}
