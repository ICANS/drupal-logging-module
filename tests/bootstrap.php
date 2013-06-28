<?php
/**
 * This file uses composer autloader to have autoloading for drupal in place.
 *
 * @author    Oliver Peymann
 * @author     Mike Lohmann
 * @copyright (C) 2013 ICANS GmbH
 */
if (!defined('DRUPAL_ROOT') || !DRUPAL_ROOT) {
    throw new \Exception('Please set DRUPAL_ROOT in phpunit.xml!');
}

require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);


// register modules namespaces
if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    $loader = require __DIR__ . '/../vendor/autoload.php';
} else if (file_exists(DRUPAL_ROOT . '/../vendor/autoload.php')) {
    $loader = require DRUPAL_ROOT . '/../vendor/autoload.php';
} else {
    throw new Exception('Could not find a loader. Please use composer to create one');
}

$map = require DRUPAL_ROOT . '/../vendor/composer/autoload_namespaces.php';
foreach ($map as $namespace => $path) {
    $loader->add($namespace, $path);
}