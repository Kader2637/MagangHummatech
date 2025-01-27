<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\StoreInterface;

interface AttendanceDetailInterface extends StoreInterface
{
    public function checkAttendanceToday(array $data): mixed;
}
