<?php
/**
 * Declares BasicIcansEvent
 *
 * @author     Oliver Peymann
 * @copyright  2013 Icans GmbH (http://www.icans-gmbh.com)
 */
namespace Icans\Event;

use Icans\Event\EventInterface;

use Symfony\Component\EventDispatcher\Event;

/**
 * Base class for all custom events
 *
 */
class BasicIcansEvent extends IcansEvent
{
    public function __construct($handle, $version)
    {
        parent::__construct($handle, $version);
    }


}
