<?php

require './BaseClasses/RepairStation.php';

class EngineRepairStation extends RepairStation
{
    public function __construct($name, $workers, $address)
    {
        parent::__construct($name, $workers, $address);
    }

    public function getMaterials()
    {
        return 'Getting materials in engine repair station...';
    }

    public function repair()
    {
        return 'Repairing in body engine station...';
    }
}