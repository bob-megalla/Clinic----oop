<?php
session_start();
class Session
{
    /// setting session
    public static function setSession($key, $value)
    {
        $_SESSION[$key] = $value;
    }


    /// getting session
    public static function getSession($key)
    {
        return $_SESSION[$key] ?? null;
    }

    /// remove session
    public static function removeSession($key)
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    /// destroy session
    public static function destroySession()
    {
        unset($_SESSION);

        session_destroy();
    }

    /// has session
    public static function hasSession($key)
    {
        return self::getSession($key);
    }

    /// flash session
    public static function flashSession($key)
    {
        if (self::hasSession($key)) {
            $value = self::getSession($key);
            self::removeSession($key);
            return $value;
        }
    }

    /// get all session
    public static function getAllSession()
    {
        return $_SESSION;
    }
}