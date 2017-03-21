<?php

class Controller
{

    public $name;

    public  function newsym($name)
    {
        $file = ROOT.DS.'controller'.DS.$name.'.php';
        require_once($file);
        return (new $name);
    }



    public function __construct()
    {

    }

    
}
