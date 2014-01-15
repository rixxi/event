<?php

namespace Rixxi\Event;

use Nette;


trait Redirect /* implements IRedirect */
{

	/** @var array */
	private $redirect;

	/** @var bool */
	private $redirectUrl;


	/** @return bool */
	public function hasRedirect()
	{
		return $this->redirect !== NULL;
	}


	public function redirect($code, $destination = NULL, $args = array())
	{
		// Nette\Application\UI\PresenterComponent::redirect([$code, ]$destination[, $arguments])
		$arguments = array($code);
		if ($destination !== NULL) {
			$arguments[] = $destination;
			if ($args !== array()) {
				$arguments[] = $args;
			}
		}
		$this->redirect = $arguments;
		$this->redirectUrl = FALSE;
	}


	public function redirectUrl($url, $code = NULL)
	{
		$this->redirect = func_get_args();
		$this->redirectUrl = TRUE;
	}


	public function performRedirect(Nette\Application\UI\Presenter $presenter)
	{
		if ($this->hasRedirect()) {
			call_user_func_array(array($presenter, $this->redirectUrl ? 'redirectUrl' : 'redirect'), $this->redirect);
		}
	}

}
