<?php

namespace Rixxi\Event;

use Nette;


class Redirector extends Nette\Object
{

	/** @var \Nette\Application\Application */
	private $application;


	public function __construct(Nette\Application\Application $application)
	{
		$this->application = $application;
	}


	/**
	 * @param IRedirect $event
	 */
	public function handle(IEvent $event)
	{
		Helper::assertRedirectInterface($event);
		if ($event->hasRedirect()) {
			$event->performRedirect($this->application->getPresenter());
		}
	}

}
