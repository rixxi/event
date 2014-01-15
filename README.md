KISS pattern for solving most of the onEvent problems using basket with some code (IEvent).

Solves $presenter->redirect([$code, ], $destination[, $arguments]) for you in civilized manner

```php
<?php

use Rixxi\Event\IEvent;
use Rixxi\Event\IRedirect;
use Rixxi\Event\Redirect as RedirectTrait;

class ShitHappensEvent implements IEvent, IRedirect
{

  use RedirectTrait;

}

class Service extends Nette\Object
{

  public $onShitHappens = [];


  public function __construct(Rixxi\Event\Redirector $redirector)
  {
    $this->redirector = $redirector;
  }
  
  
  public function makeShitHappen()
  {
    $this->onShitHappens($event = ShitHappensEvent);
    $this->redirector->handle($event);
  }

}


// register extension and let DI do its magic

$service = new Service();

$service->onShitHappen[] = function (ShitHappensEvent $e) {
  if (/* some important condition */) {
    $e->redirect('Presenter:action', [ 'arguments ' ]);
  }
};

$service->onShitHappen[] = function () {
  echo 'Default $presenter->redirect(...) would kill request before I can write something. So grateful!';
};

// you can easily add default redirection
$service->onShitHappen[] = Rixxi\Event\Helper::defaultRedirect('Homepage:default');

$service->makeShitHappen();
// shit will happen and then redirection too
```
