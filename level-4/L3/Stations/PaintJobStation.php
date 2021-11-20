<?php

require './BaseClasses/Station.php';

class PaintJobStation extends Station
{
    public function __construct($name, $workers, $address)
    {
        parent::__construct($name, $workers, $address);
    }

    public function paint()
    {
        return 'Painting in paint job station...';
    }
}