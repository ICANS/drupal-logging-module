<?php
/**
 * Declares AnalyticsProcessor
 *
 * @author    Oliver Peymann
 * @author     Mike Lohmann
 * @copyright (C) 2013 ICANS GmbH
 */
namespace Icans\Logging;

use ICANS\Component\IcansLoggingComponent\Api\V1\PostProcessorInterface;
use ICANS\Component\IcansLoggingComponent\Api\V1\MessageFactoryInterface;

/**
 * AnalyticsProcessor enriches the log body with some global request data
 *
 * @author    Oliver Peymann
 * @author     Mike Lohmann
 * @copyright (C) 2013 ICANS GmbH
 */
class AnalyticsProcessor implements PostProcessorInterface
{
    /**
     * @var MessageFactoryInterface
     */
    private $messageFactory;

    /**
     * Constructor
     */
    public function __construct(MessageFactoryInterface $messageFactory)
    {
        $this->messageFactory = $messageFactory;
    }

    /**
     * {@inheritDoc}
     */
    public function processRecord(array $record)
    {
        // @todo: This should be configurable. Please see the README.md for more infos.
        $eventHandle = 'default-eventhandle';
        $eventVersion = 1;
        $eventBody = $record['context'];
        $originServiceType = 'Logging Module';
        $originServiceComponent = 'default-component';
        $originServiceInstance = 'default-instance';

        $message = $this->messageFactory->createMessage(
            'log',
            $eventHandle,
            $eventVersion,
            $eventBody,
            'app',
            $originServiceType,
            $originServiceComponent,
            $originServiceInstance,
            $record['level'],
            $record['level_name']
        );

        return $message->getRawData();
    }

    /**
     * {@inheritDoc}
     */
    public function __invoke($record)
    {
        return $this->processRecord($record);
    }
}
