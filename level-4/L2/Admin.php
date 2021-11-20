<?php
/** @noinspection PhpMultipleClassDeclarationsInspection */

class Admin extends User
{
    public function __construct($name, $age) {
        parent::__construct($name, $age);
    }
}