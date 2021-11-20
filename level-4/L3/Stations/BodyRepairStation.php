<?php

require './BaseClasses/RepairStation.php';

class BodyRepairStation extends RepairStation
{
    public function __construct($name, $workers, $address)
    {
        parent::__construct($name, $workers, $address);
    }

    public function getMaterials()
    {
        return 'Getting materials in body repair station...';
     }

    public function repair()
    {
        return 'Repairing in body repair station...';
    }
}