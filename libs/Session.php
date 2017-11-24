<?php
/**
 * Created by PhpStorm.
 * User: Knarik
 * Date: 23-Sep-17
 * Time: 10:56 AM
 */
class Session
{
    public static function init()
    {
        @session_start();
    }
    public static function set($key,$value)
    {

        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        if (isset($_SESSION[$key]))
        {
        return $_SESSION[$key];
        }else {
            return null;
        }
    }
    public static function destroy()
    {
        //unset($_SESSION);
        session_destroy();
    }

}