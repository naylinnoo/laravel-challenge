<?php

namespace App\Services\InternetServiceProvider;

use App\Services\InternetServiceProvider\Interfaces\OperatorInterface;

class Mpt extends Operator implements OperatorInterface
{
    public function __construct(){
        $this->operator="mpt";
        $this->monthlyFees=200;
    }
}