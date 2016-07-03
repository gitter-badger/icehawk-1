<?php
/**
 * @author h.woltersdorf
 */

namespace Fortuneglobe\IceHawk\Tests\Unit\Defaults;

use Fortuneglobe\IceHawk\Defaults\FinalReadResponder;
use Fortuneglobe\IceHawk\Defaults\FinalWriteResponder;
use Fortuneglobe\IceHawk\Defaults\IceHawkConfig;
use Fortuneglobe\IceHawk\Defaults\RequestInfo;

class IceHawkConfigTest extends \PHPUnit_Framework_TestCase
{
	public function testDefaults()
	{
		$config = new IceHawkConfig();

		$this->assertEquals( [ ], $config->getEventSubscribers() );
		$this->assertEquals( RequestInfo::fromEnv(), $config->getRequestInfo() );
		$this->assertEquals( new FinalReadResponder(), $config->getFinalReadResponder() );
		$this->assertEquals( new FinalWriteResponder(), $config->getFinalWriteResponder() );
		$this->assertEquals( [], $config->getWriteRoutes() );
		$this->assertEquals( [], $config->getReadRoutes() );
	}
}
