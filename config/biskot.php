#!/usr/bin/php -q
<?php
/**
 * BISKOT - Micro PHP Framework
 *
 * @author     Toast Games
 * @copyright  2014 Toast Games <http://toast-games.com>
 * @version    Biskot 0.2
 */

/**
    ONLY CLI SCRIPT
*/
if (cli())
    exit;
/**
    GET OS
*/
$os = os();

/**
    SWITCH WITH PARAMETER
*/
$out = "          BISKOT - ";

if (isset($argv[1]))
{
    switch ($argv[1])
    {
        // DATABASE CREATE
        case 'db:create':
            $out .= "DOCTRINE CREATE DATABASE";
            $func = "db_create";
            break;

        // DATABASE DROP (FORCE)
        case 'db:drop':
            $out .= "DOCTRINE DROP DATABASE";
            $func = "db_drop_force";
            break;

        // DATABASE UPDATE (FORCE)
        case 'db:update':
            $out .= "DOCTRINE UPDATE DATABASE";
            $func = "db_update_force";
            break;

        default:
            $out = "Error : Invalid parameter.";
            break;
    }
}
else
{
    $out = "Error : You have to set a parameter.";
}

/**
    OUTPUT
*/
echo title()."\n";

echo $out."\n\n";

if (isset($func))
    $func($os);

echo footer()."\n";
exit;

/**
    PARAMETERS FUNCTIONS
*/
function db_create($os)
{
    if ($os === "win")
        echo shell_exec("php vendor/doctrine/orm/bin/doctrine orm:schema-tool:create");
    else
        echo shell_exec("php vendor/bin/doctrine orm:schema-tool:create");
}

function db_drop_force($os)
{
    if ($os === "win")
        echo shell_exec("php vendor/doctrine/orm/bin/doctrine orm:schema-tool:drop --force");
    else
        echo shell_exec("php vendor/bin/doctrine orm:schema-tool:drop --force");
}

function db_update_force($os)
{
    if ($os === "win")
        echo shell_exec("php vendor/doctrine/orm/bin/doctrine orm:schema-tool:update --force");
    else
        echo shell_exec("php vendor/bin/doctrine orm:schema-tool:update --force");
}

/**
    OUTPUT FUNCTIONS
*/
function title()
{
    $title = "";
    $title .= " ________________  _      _                         \n";
    $title .= "(______________  \(_)    | |          _             \n";
    $title .= "           ____)  )_  ___| |  _ ___ _| |_   BETA    \n";
    $title .= "   TOAST  |  __  (| |/___) |_/ ) _ (_   _)  V0.2    \n";
    $title .= "   GAMES  | |__)  ) |___ |  _ ( |_| || |___________ \n";
    $title .= "          |______/|_(___/|_| \_)___/ \_____________)\n";

    return $title;
}

function footer()
{
    $footer = "";
    $footer .= "\n----------------------------------------------------";

    return $footer;
}

function cli()
{
    return !strstr(php_sapi_name(), 'cli');
}

function os()
{
    $os = "s";

    if (strstr(php_uname(), 'Win'))
        $os = "win";

    return $os;
}
?>
