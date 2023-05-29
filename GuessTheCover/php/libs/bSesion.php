<?php

function iniciaSesion()
{
    session_start();
    if ((!isset($_SESSION['rol']))) {
        $_SESSION['rol'] = 0;
    }

    function compruebaSesion($rol = 1)
    {
        if ($_SESSION['rol'] >= $rol)
            return true;
        else
            return false;
    }
}

    
