<?php

namespace Rixxi\Event;

use Nette;


interface IRedirect
{

	/** @return bool */
	function hasRedirect();

	/**
	 * @see Nette\Application\UI\Presenter::redirect
	 */
	function redirect($code, $destination = NULL, $args = array());

	/**
	 * @see Nette\Application\UI\Presenter::redirectUrl
	 */
	function redirectUrl($url, $code = NULL);


	function performRedirect(Nette\Application\UI\Presenter $presenter);

}
