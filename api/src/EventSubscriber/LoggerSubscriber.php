<?php

declare(strict_types=1);

namespace App\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Book;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * @author Grégoire Hébert gregoire@les-tilleuls.coop
 */
class LoggerSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['logRegistration', EventPriorities::POST_WRITE],
        ];
    }

    public function logRegistration(GetResponseForControllerResultEvent $event)
    {
        $data = $event->getControllerResult();
        if (!is_a($data, Book::class)) {
            return;
        }

        // send mail...
        dump($data);
    }

}
