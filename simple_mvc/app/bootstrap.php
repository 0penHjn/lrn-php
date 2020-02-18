<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10.10.2019
 * Time: 14:32
 */

/**
 *Load config
 */
require_once 'config/config.php';
/**
*Load libraries
 */
//require_once 'lib/Controller.php';
//require_once 'lib/Core.php';
//require_once 'lib/Database.php';

/**
 *Autoload core libraries
 */

spl_autoload_register(function($className){
    require_once 'lib/' . $className . '.php';
});