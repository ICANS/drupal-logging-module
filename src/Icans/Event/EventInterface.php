<?php
/**
 * Description of EventInterface
 *
 * @author      Axel Kelting
 * @copyright   2013 ICANS GmbH (http://www.icans-gmbh.com)
 */
namespace Icans\Event;

/**
 * Common interface each custom event has to implement.
 */
interface EventInterface
{
    /**
     * key for accessing the handle of this event.
     * @var string
     */
    const EVENT_HANDLE_KEY = 'handle';

    /**
     * key for accessing the version of this event.
     * @var string
     */
    const EVENT_VERSION_KEY = 'version';

    /**
     * key for accessing the service type of this event.
     * @var string
     */
    const EVENT_SERVICE_TYPE_KEY = 'serviceType';

    /**
     * key for accessing the service instance of this event.
     * @var string
     */
    const EVENT_SERVICE_INSTANCE_KEY = 'serviceInstance';

    /**
     * key for accessing the service component of this event.
     * @var string
     */
    const EVENT_SERVICE_COMPONENT_KEY = 'serviceComponent';

    /**
     * key for accessing the message of this event
     * @var string
     */
    const EVENT_SERVICE_MESSAGE_KEY = 'message';

    /**
     * Returns the payload for this event.
     *
     * @return array
     */
    public function getData();

    /**
     * @return string
     */
    public function getHandle();

    /**
     * @return string $serviceType
     */
    public function getServiceType();

    /**
     * @return string $serviceInstance
     */
    public function getServiceInstance();

    /**
     * @return string $serviceComponent
     */
    public function getServiceClass();

    /**
     * @param string $serviceType
     */
    public function setServiceType($serviceType);

    /**
     * @param string $serviceInstance
     */
    public function setServiceInstance($serviceInstance);

    /**
     * @param string $serviceComponent
     */
    public function setServiceComponent($serviceComponent);
}