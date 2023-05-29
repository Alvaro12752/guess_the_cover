<?php
function sinTildes($frase)
{
    $no_permitidas = array(
        "á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", "à", "è", "ì", "ò", "ù", "À", "È", "Ì", "Ò", "Ù"
    );
    $permitidas = array(
        "a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "a", "e", "i", "o", "u", "A", "E", "I", "O", "U"
    );
    $texto = str_replace($no_permitidas, $permitidas, $frase);
    return $texto;
}

function sinEspacios($frase)
{
    $texto = trim(preg_replace('/ +/', ' ', $frase));
    return $texto;
}

function recoge($var)
{
    if (isset($_REQUEST[$var])) {
        $tmp = sinEspacios($_REQUEST[$var]);
        $tmp = strip_tags($tmp);
    } else
        $tmp = "";

    return $tmp;
}

function cTexto($text)
{
    if (preg_match("/^[A-Za-zÑñ]+$/", sinTildes($text)))
        return true;
    else
        return false;
}

function recogerArray($aficiones)
{
    return $_POST[$aficiones];
}

function cNum($num)
{
    if (preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])[a-zA-Z0-9]{6,}$/", $num))
        return true;
    else
        return false;
}

function cRadio(string $text, string $campo, array &$errores, array $valores, bool $requerido = TRUE)
{
    if (in_array($text, $valores)) {
        return true;
    }
    if (!$requerido && $text == "") {
        return true;
    }
    $errores[$campo] = "Error en el campo $campo";
    return false;
}

/**
 * Funcion cCheck
 *
 * Valida que los valores seleccionado en un checkbox array están dentro de los
 * valores válidos dados en un array
 *
 * @param array $text
 * @param string $campo
 * @param array $errores
 * @param array $valores
 * @param bool $requerido
 *
 * @return boolean
 */

function cCheck(array $text, string $campo, array &$errores, array $valores, bool $requerido = TRUE)
{
    if (($requerido) && (count($text) === 0)) {
        $errores[$campo] = "Error en el campo $campo";
        return false;
    }
    foreach ($text as $valor) {
        if (!in_array($valor, $valores)) {
            $errores[$campo] = "Error en el campo $campo";
            return false;
        }
    }
    return true;
}

function password($pass)
{
    if (preg_match("/[\w]{5,}/", $pass)) {
        return true;
    } else {
        return false;
    }
}

function email($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function web($web)
{
    if (!filter_var($web, FILTER_VALIDATE_URL) === false) {
        return true;
    } else {
        return false;
    }
}

function sanitize(string $request_key, bool $tags = true, bool $entities = false, bool $spaces = true): string {
    /* Valor a devolver por defecto */
    $sanitized = "";

    /*
     * Filtros de saneamiento predefinidos para usar filter_var() con algunos campos.
     * En estos casos los booleanos $tags, $entities y $espacios se ignoran
     */
    $filters = array(
        /* no hay campos con filtros predefinidos */
    );

    /* Solo se sanea la variable si existe en el array $_REQUEST y no es un array */
    if(isset($_REQUEST[$request_key]) && !is_array($_REQUEST[$request_key])) {
        $sanitized = $_REQUEST[$request_key];
        /* Se comprueba si se puede sanear con filtros preexistentes */
        if(array_key_exists($request_key, $filters)) {
            $sanitized = filter_var($sanitized, $filters[$request_key]);
        } else {
            /* Saneamiento genérico según las opciones especificadas al llamar a la función */
            if($spaces) {
                $sanitized = sinEspacios($sanitized);
            }
            if($tags) {
                $sanitized = strip_tags($sanitized);
            }
            if($entities) {
                $sanitized = htmlentities($sanitized, ENT_QUOTES);
            }
        }
    }
    return $sanitized;
}
    ?>