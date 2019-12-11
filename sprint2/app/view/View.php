<?php

require_once ("../model/Item.php");

class View
{

    private $routeV;
    protected $data;


    public function __construct($route)
    {
        $this->routeV=$route;



    }

    public function display()
    {
        $vue="../app/view/".$this->routeV['controller']."/".$this->routeV['action'].".php";
        $m = new Item();


        if(file_exists($vue))
        {
            include($vue);
        }

    }

    public function setData($data)
    {
        $this->data=$data;
    }

    public function getData()
    {
        return $this->data;
    }

}