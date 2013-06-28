<?php
/**
 * Declares IcansEvent
 *
 * @author     Wolf Bauer
 * @copyright  2013 Icans GmbH (http://www.icans-gmbh.com)
 */
namespace Icans\Event;

use Icans\Event\EventInterface;

use Symfony\Component\EventDispatcher\Event;

/**
 * Base class for all custom events
 *
 * @SuppressWarnings(PHPMD.NumberOfChildren)
 */
abstract class IcansEvent extends Event implements EventInterface
{
    /**
     * @var array
     */
    protected $data = array();

    /**
     * Contructor for the video error event
     *
     * @param string $handle  handle for this event
     * @param string $version version of this event
     * @param array  $data    additional data for this event
     */
    public function __construct($handle, $version, array $data = array())
    {
        $this->data = $data;
        $this->setValue(self::EVENT_HANDLE_KEY, $handle);
        $this->setValue(self::EVENT_VERSION_KEY, $version);
    }

    /**
     * {@inheritDoc}
     */
    public function getHandle()
    {
        return $this->getValue(self::EVENT_HANDLE_KEY);
    }

    /**
     * {@inheritDoc}
     */
    public function getServiceType()
    {
        return $this->getValue(self::EVENT_SERVICE_TYPE_KEY);
    }

    /**
     * {@inheritDoc}
     */
    public function getServiceInstance()
    {
        return $this->getValue(self::EVENT_SERVICE_INSTANCE_KEY);
    }

    /**
     * {@inheritDoc}
     */
    public function getServiceClass()
    {
        return $this->getValue(self::EVENT_SERVICE_COMPONENT_KEY);
    }

    /**
     * {@inheritDoc}
     */
    public function setServiceType($serviceType)
    {
        $this->setValue(self::EVENT_SERVICE_TYPE_KEY, $serviceType);
    }

    /**
     * {@inheritDoc}
     */
    public function setServiceInstance($serviceInstance)
    {
        $this->setValue(self::EVENT_SERVICE_INSTANCE_KEY, $serviceInstance);
    }

    /**
     * {@inheritDoc}
     */
    public function setServiceComponent($serviceComponent)
    {
        $this->setValue(self::EVENT_SERVICE_COMPONENT_KEY, $serviceComponent);
    }

    /**
     * {@inheritDoc}
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Get the value for the given key from data.
     *
     * @param string $propertyName
     *
     * @return string
     */
    protected function getValue($propertyName)
    {
        $result = '';
        if (array_key_exists($propertyName, $this->data)) {
            $result = $this->data[$propertyName];
        }
        return $result;
    }

    /**
     * Set the value for the given key from data.
     *
     * @param string $propertyName
     * @param string $propertyValue
     */
    protected function setValue($propertyName, $propertyValue)
    {
        $this->data[$propertyName] = $propertyValue;
    }

    /**
     * Get the value for the given key from data as bool.
     *
     * @param string $propertyName
     *
     * @return bool
     */
    protected function getValueAsBool($propertyName)
    {
        $result = $this->getValue($propertyName);
        if (!is_bool($result)) {
            $result = false;
        }
        return $result;
    }

    /**
     * Set the value for the given key from data.
     *
     * @param string $propertyName
     * @param bool   $propertyValue
     */
    protected function setBoolValue($propertyName, $propertyValue)
    {
        $this->data[$propertyName] = $propertyValue;
    }

    /**
     * Get the value for the given key from data as bool.
     *
     * @param string $propertyName
     *
     * @return array
     */
    protected function getValueAsArray($propertyName)
    {
        $result = $this->getValue($propertyName);
        if (!is_array($result)) {
            $result = array();
        }
        return $result;
    }

    /**
     * Set the value for the given key as array.
     *
     * @param string $propertyName
     * @param array  $propertyValue
     */
    protected function setArrayValue($propertyName, array $propertyValue)
    {
        $this->data[$propertyName] = $propertyValue;
    }
}
