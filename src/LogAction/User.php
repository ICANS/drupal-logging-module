<?php
/**
 * Declares the UserLogin class.
 *
 * @author    Oliver Peymann
 * @author     Mike Lohmann
 * @copyright (C) 2013 ICANS GmbH
 */

use Symfony\Component\DependencyInjection\ContainerInterface;

use Icans\Event\BasicIcansEvent;

/**
 * Implements hook_user_login
 *
 * @param $edit
 * @param $account
 */
    function logging_user_login(&$edit, $account) {
        // @todo make the code fancy and make it use the analytics processor!


        $event = new BasicIcansEvent('icans.customer.login','1');
        watchdog('Login', 'user has logged in!', array($account, $event), WATCHDOG_NOTICE);

}