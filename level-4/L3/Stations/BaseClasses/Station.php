<?php

require '../Interfaces/iStation.php';

abstract class Station implements iStation
{
    private $name;
    private $workers;
    private $address;

    public function __construct(
        $name,
        $workers,
        $address
    )
    {
        $this->name = $name;
        $this->workers = $workers;
        $this->address = $address;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getWorkers()
    {
        return $this->workers;
    }

    public function getAddress()
    {
        return $this->address;
    }
}