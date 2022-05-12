<?php

namespace App\Services\InternetServiceProvider\Interfaces;

Interface OperatorInterface
{
    public function setMonth(int $month);
    public function calculateTotalAmount();
}