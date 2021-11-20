<?php

require './RepairStation.php';

abstract class RepairStation extends Station
{
    public abstract function getMaterials();

    public abstract function repair();
}