<?php

namespace App\Services\InternetServiceProvider;

use App\Services\InternetServiceProvider\Interfaces\OperatorInterface;

class Ooredoo extends Operator implements OperatorInterface
{
    public function __construct(){
        $this->operator = 'Ooredoo';
        $this->monthlyFees = 150;
    }
}