<?php

namespace App\Subscriber;

use App\Entity\Painting;
use App\Service\ImageService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

class PostImageSubscriber implements EventSubscriberInterface
{
    private $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public static function getSubscribedEvents()
    {
        return array(
            'easy_admin.pre_persist' => array('postImage'),
        );
    }

    function postImage(GenericEvent $event) {
        $result = $event->getSubject();
        $method = $event->getArgument('request')->getMethod();

        if (! $result instanceof Painting || $method !== Request::METHOD_POST) {
            return;
        }

        if ($result->getPicture() instanceof UploadedFile) {
            $url = $this->imageService->saveToDisk($result->getPicture());
            $result->setPicture($url);
        }
    }
}