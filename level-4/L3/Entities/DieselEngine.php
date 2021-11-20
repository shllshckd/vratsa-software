<?php

require './BaseClasses/Engine.php';

class DieselEngine extends Engine
{
    public function __construct($name, $type)
    {
        parent::__construct($name, $type);
    }
}