<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Calculator
{
    #[Assert\Regex(
        pattern: '/\D/',
        match: false,
        message: 'Введите число',
    )]
    public $arg1;

    #[Assert\Regex(
        pattern: '/\D/',
        match: false,
        message: 'Введите число',
    )]
    public $arg2;

    public $sign;
	
    public function __construct($arg1=1, $arg2=1, $sign="+")
    {
		$this->arg1 = $arg1;
		$this->arg2 = $arg2;
		$this->sign = $sign;
    }

	public function addition()
    {
        return $this->arg1 + $this->arg2;
    }

    public function subtraction()
    {
        return $this->arg1 - $this->arg2;
    }

    public function multiplication()
    {
        return $this->arg1 * $this->arg2;
    }

    public function division()
    {
        return $this->arg1 / $this->arg2;
    }

}
