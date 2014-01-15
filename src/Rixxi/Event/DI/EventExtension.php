<?php

namespace Rixxi\Event\DI;

use Nette;


class EventExtension extends Nette\DI\CompilerExtension
{

	public function loadConfiguration()
	{
		$container = $this->getContainerBuilder();

		$container->addDefinition($this->prefix('redirector'))
			->setClass('Rixxi\Event\Redirector');
	}

}
