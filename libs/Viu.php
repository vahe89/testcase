<?php
/**
 * Created by PhpStorm.
 * User: Knarik
 * Date: 21-Sep-17
 * Time: 9:10 AM
 */
class Viu
{
    function __construct()
    {
        //echo 'This is the view';
    }
    public function render($name, $noninclude = false)
    {
        if ($noninclude == true)
        {
            require 'views/'.$name.'.php';
        }else{
            require 'views/'.'header.php';
            //require 'views'.substr($name,0,-1).'.php';
            require 'views/'.$name.'.php';
            require 'views/'.'footer.php';
        }

    }
}