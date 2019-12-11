<?php


class Controller
{
    protected $route;
    protected $vue;

    public function __construct($route)
    {
        $this->route = $route;
        $this->vue = new View($route);
    }

    public function display()
    {
            $this->vue->display();
    }


}