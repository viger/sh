<?php
if( 'development' == $_SERVER['RUNTIME_ENVIROMENT'] ){
    error_reporting(E_ALL);
}
define('__DS__', DIRECTORY_SEPARATOR);
define('APP_ROOT', realpath(dirname(__FILE__).__DS__."..").__DS__);
define('ROUTER_PATH', $_GET['_n_p_']);
unset($_GET['_n_p_']);
$params = $_REQUEST;

require_once(APP_ROOT."config".__DS__."router.php");
require_once(APP_ROOT."lib".__DS__."smart_home".__DS__."bootstrap.class.php");
$boot = new lib\SmartHome\BootStrap();
