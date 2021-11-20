<?php

class Product
{
    public $name;
    public $price;
    public $weight;
    public $color;

    public function __construct($name, $price, $weight, $color)
    {
        $this->name = $name;
        $this->price = $price;
        $this->weight = $weight;
        $this->color = $color;
    }

    public function get_name()
    {
        return $this->name;
    }

    public function get_price()
    {
        return $this->price;
    }

    public function get_weight()
    {
        return $this->weight;
    }

    public function get_color()
    {
        return $this->color;
    }

    public function get_info()
    {
        return join(', ',
            array($this->get_name(), $this->get_price(), $this->get_weight(), $this->get_color())
        );
    }
}