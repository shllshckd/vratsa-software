<?php

require './BaseClasses/Engine.php';

class HybridEngine extends Engine
{
    public function __construct($name, $type)
    {
        parent::__construct($name, $type);
    }
}