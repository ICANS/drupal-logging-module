<?php
/**
 * This file contains the WatchdogSeverityMapperTest.
 *
 * @author    Oliver Peymann
 * @author     Mike Lohmann
 * @copyright (C) 2013 ICANS GmbH
 */
namespace Icans\Logging\Mapper;

use Icans\Logging\Mapper\WatchdogSeverityMapper;
use Monolog\Logger;

/**
 * Definition of the WatchdogSeverityMapperTest. Contains Unittests for WatchdogSeverityMapper.
 *
 * @covers Icans\Module\Logging\Mapper\WatchdogSeverityMapper
 */
class WatchdogSeverityMapperTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var array
     */
    private $mapping;

    /**
     * @var WatchdogSeverityMapper
     */
    protected $subject;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->mapping = array(
            WATCHDOG_ALERT => Logger::ALERT,
            WATCHDOG_CRITICAL => Logger::CRITICAL,
            WATCHDOG_DEBUG => Logger::DEBUG,
            WATCHDOG_EMERGENCY => Logger::EMERGENCY,
            WATCHDOG_ERROR => Logger::ERROR,
            WATCHDOG_INFO => Logger::INFO,
            WATCHDOG_NOTICE => Logger::NOTICE,
            WATCHDOG_WARNING => Logger::WARNING
        );

        $this->subject = new WatchdogSeverityMapper();
    }

    /**
     * @covers Icans\Module\Logging\Mapper\WatchdogSeverityMapper::getMappedSeverity($severity)
     */
    public function testCorrectMappedSeverityValue()
    {
        $this->assertEquals(Logger::ALERT, $this->subject->getMappedSeverity(WATCHDOG_ALERT));
        $this->assertEquals(Logger::ERROR, $this->subject->getMappedSeverity(WATCHDOG_ERROR));
    }

    /**
     * @covers Icans\Module\Logging\Mapper\WatchdogSeverityMapper::getMappedSeverity($severity)
     */
    public function testWrongMappedSeverityValue()
    {
        $this->assertEquals(Logger::ERROR, $this->subject->getMappedSeverity(513));
    }
}