<?php

namespace App\Services\InternetServiceProvider;

use App\Services\InternetServiceProvider\Interfaces\OperatorInterface;

class Operator implements OperatorInterface
{

    protected string $operator;
    protected int $month = 0;
    protected int $monthlyFees;


    public function setMonth(int $month)
    {
        $this->month = $month;
    }

    public function calculateTotalAmount(): float|int
    {
        return $this->month * $this->monthlyFees;
    }
}