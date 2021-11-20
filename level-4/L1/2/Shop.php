<?php

class Shop
{
    public $name;
    public $size;
    public $price;
    public $products;

    public function __construct($name, $size, $price, $products)
    {
        $this->name = $name;
        $this->size = $size;
        $this->price = $price;
        $this->products = $products;
    }

    public function get_name()
    {
        return $this->name;
    }

    public function get_size()
    {
        return $this->size;
    }

    public function get_price()
    {
        return $this->price;
    }


    public function get_products()
    {
        $stack = array();

        foreach ($this->products as $value)  {
            array_push($stack, $value);
        }

        return 'Products: [' . join(', ', $stack) . ']';
    }


    public function get_info()
    {
        return join(', ',
            array($this->get_name(), $this->get_size(), $this->get_price(), $this->get_products())
        );
    }
}