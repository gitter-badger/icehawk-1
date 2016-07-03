<?php
/**
 * @author hollodotme
 */

namespace Fortuneglobe\IceHawk\PubSub\Interfaces;

use Fortuneglobe\IceHawk\Interfaces\ProvidesRequestInfo;

/**
 * Interface CarriesEventData
 * @package Fortuneglobe\IceHawk\PubSub\Interfaces
 */
interface CarriesEventData
{
	public function getRequestInfo() : ProvidesRequestInfo;
}