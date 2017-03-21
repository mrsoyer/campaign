<?php
ini_set('memory_limit','-1');
set_time_limit(0);

define('WEBROOT', dirname(__FILE__));
define('ROOT', dirname(WEBROOT));
define('DS', DIRECTORY_SEPARATOR);
define('CORE', ROOT.DS.'core');
define('CONFIG', ROOT.DS.'config');
define('SYM', '$this');
date_default_timezone_set('Europe/Paris');

require(CORE.DS.'includes.php');

if (isset($_GET['url']))
{
    $r = new Router($_GET['url']);
    $r->executeHttpAction();
}

else if (isset($argc) && isset($argv))
{
    $r = new ShellRouter($argc, $argv);
    $r->executeAction();
}

?>
