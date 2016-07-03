<?php
/**
 * @author hollodotme
 */

namespace Fortuneglobe\IceHawk\Routing;

use Fortuneglobe\IceHawk\Constants\HandlerMethodInterfaceMap;
use Fortuneglobe\IceHawk\Exceptions\UnresolvedRequest;
use Fortuneglobe\IceHawk\Routing\Interfaces\ProvidesDestinationInfo;
use Fortuneglobe\IceHawk\Routing\Interfaces\RoutesToReadHandler;

/**
 * Class ReadRouter
 *
 * @package Fortuneglobe\IceHawk\Routing
 */
final class ReadRouter extends AbstractRouter
{
	/**
	 * @param ProvidesDestinationInfo $destinationInfo
	 *
	 * @throws UnresolvedRequest
	 * @return RoutesToReadHandler
	 */
	public function findMatchingRoute( ProvidesDestinationInfo $destinationInfo ) : RoutesToReadHandler
	{
		$requiredHandlerType = HandlerMethodInterfaceMap::HTTP_METHODS[ $destinationInfo->getRequestMethod() ];
		$uri                 = $destinationInfo->getUri();

		foreach ( $this->getRoutes() as $route )
		{
			if ( !($route instanceof RoutesToReadHandler) )
			{
				continue;
			}

			if ( $route->matches( $uri ) && $route->getRequestHandler() instanceof $requiredHandlerType )
			{
				return $route;
			}
		}

		throw ( new UnresolvedRequest() )->withDestinationInfo( $destinationInfo );
	}
}