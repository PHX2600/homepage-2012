<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{


}

// Autoload custom namespace
require_once "Zend/Loader/Autoloader.php";
$autoloader = Zend_Loader_Autoloader::getInstance();
$autoloader->registerNamespace('PHX2600_');