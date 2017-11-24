<?php
class View
{
    function __construct()
    {
        //echo 'This is the view';
    }
    public function render($name, $vars = [], $noninclude = false)
    {
        ob_start();
        extract($vars);

        if ($noninclude == true)
        {
            require 'views/'.$name.'.php';
        }else{
            require 'views/'.'header.php';
            //require 'views'.substr($name,0,-1).'.php';
            require 'views/'.$name.'.php';
            require 'views/'.'footer.php';
        }
        return ob_get_clean();

    }
}