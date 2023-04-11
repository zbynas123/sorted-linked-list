<?php
namespace App\EventListener;

use Symfony\Component\HttpKernel\Event\RequestEvent;

class RequestListener
{
    public function onKernelRequest(RequestEvent $event): void
    {
        $request = $event->getRequest();
        $request->request
            ->replace(json_decode(
                (string) $request->getContent() ?: '[]',
                true,
                512,
                JSON_THROW_ON_ERROR
            ));
    }
}