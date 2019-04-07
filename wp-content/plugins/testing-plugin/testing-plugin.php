<?php
/**
* Plugin Name: Testing Plugin
* Plugin URI: https://zeidan.info/testing-plugin
* Description: Testing Plugin
* Version: 1.0
* Author: Eric Zeidan
* Author URI: http://zeidan.info/
**/

require_once 'vendor/autoload.php';

define('PLUGINS_PATH', __DIR__);

new \ezdev\TestingPlugin\MainController();