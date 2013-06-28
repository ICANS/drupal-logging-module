<?php
/**
 * Declares the WatchdogSeverityMapper class.
 *
 * @author     Mike Lohmann <mike.lohmann@icans-gmbh.com>
 * @copyright  Copyright (c) 2013 ICANS GmbH (http://www.icans-gmbh.com)
 */
namespace Icans\Logging\Mapper;

use Monolog\Logger;

/**
 * WatchdogSeverityMapper
 *
 * @author    Mike Lohmann
 * @copyright Copyright (c) 2013 ICANS GmbH (http://www.icans-gmbh.com)
 */
class WatchdogSeverityMapper
{
    /**
     * @var array
     */
    private $mapping = array(
        WATCHDOG_ALERT => Logger::ALERT,
        WATCHDOG_CRITICAL => Logger::CRITICAL,
        WATCHDOG_DEBUG => Logger::DEBUG,
        WATCHDOG_EMERGENCY => Logger::EMERGENCY,
        WATCHDOG_ERROR => Logger::ERROR,
        WATCHDOG_INFO => Logger::INFO,
        WATCHDOG_NOTICE => Logger::NOTICE,
        WATCHDOG_WARNING => Logger::WARNING
    );

    /**
     * @param int $severity
     * @return int $mappedSeverity
     */
    public function getMappedSeverity($severity)
    {
        if (array_key_exists($severity, $this->mapping)) {
            $mappedSeverity = $this->mapping[$severity];
        } else {
            $mappedSeverity = Logger::ERROR;
        }

        return $mappedSeverity;
    }

}