<?php

namespace Rixxi\Event;

use Nette;
use RuntimeException;


class Helper extends Nette\Object
{

	/**
	 * Returns callback that sets event redirect if it is not already redirected
	 * @return callback
	 * @see Nette\Application\UI\Presenter::redirect
	 */
	public static function defaultRedirect($code, $destination = NULL, $args = array())
	{
		return function (IEvent $event) use ($code, $destination, $args) {
			static::assertRedirectInterface($event);

			if (!$event->hasRedirect()) {
				$event->redirect($code, $destination, $args);
			}
		};
	}


	/**
	 * Returns callback that sets event redirect (always)
	 * @return callback
	 * @see Nette\Application\UI\Presenter::redirect
	 */
	public static function redirect($code, $destination = NULL, $args = array())
	{
		return function (IEvent $event) use ($code, $destination, $args) {
			static::assertRedirectInterface($event);

			if (!$event->hasRedirect()) {
				$event->redirect($code, $destination, $args);
			}
		};
	}


	public static function assertRedirectInterface(IEvent $event)
	{
		if (!$event instanceof IRedirect) {
			throw new RuntimeException('Event must be instance of Rixxi\Event\IRedirect.');
		}
	}

}
