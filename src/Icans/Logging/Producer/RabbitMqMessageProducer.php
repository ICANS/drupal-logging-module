<?php
/**
 * This file contains the RabbitMqMessageProducer implementation.
 *
 * PHP Version 5.3
 *
 * @author    Oliver Peymann
 * @author     Mike Lohmann
 * @copyright (C) 2013 ICANS GmbH
 */
namespace Icans\Logging\Producer;

use ICANS\Component\IcansLoggingComponent\Api\V1\AMQPMessageProducerInterface;
use Icans\Logging\Producer\BaseAmqp;
use PhpAmqpLib\Message\AMQPMessage;


/**
 * This class defines RabbitMqMessageProducer used to send messages to RabbitMQ using
 * the oldsound/rabbitmq bundle. It is just a wrapper to be able to have no dependency
 * from the component to the bundle of oldsound.
 *
 * @author    Oliver Peymann
 * @author     Mike Lohmann
 * @copyright (C) 2013 ICANS GmbH
 */
class RabbitMqMessageProducer extends BaseAmqp implements  AMQPMessageProducerInterface
{
    /**
     * @var bool
     */
    protected $declared = false;

    /**
     * Delcares the exchange options
     */
    public function exchangeDeclare()
    {
        $this->ch->exchange_declare(
            $this->exchangeOptions['name'],
            $this->exchangeOptions['type'],
            $this->exchangeOptions['passive'],
            $this->exchangeOptions['durable'],
            $this->exchangeOptions['auto_delete'],
            $this->exchangeOptions['internal'],
            $this->exchangeOptions['nowait'],
            $this->exchangeOptions['arguments']
        );

        $this->declared = true;
    }

    /**
     * Publishes the message and merges additional properties with basic properties
     *
     * @param string $msgBody
     * @param string $routingKey
     * @param array $additionalProperties
     */
    public function publish($msgBody, $routingKey = '', $additionalProperties = array())
    {
        if (!$this->declared) {
            $this->exchangeDeclare();
        }
        $msg = new AMQPMessage((string) $msgBody, array_merge($this->basicProperties, $additionalProperties));
        $this->ch->basic_publish($msg, $this->exchangeOptions['name'], (string) $routingKey);
    }

}