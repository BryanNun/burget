<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpKernel\KernelInterface;

class ImageService
{
    private $kernel;
    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    function saveToDisk(UploadedFile $painting) {
        $uploadDirectory = 'uploads/paintings/'.date("Y/m/d");
        $path = $this->kernel->getProjectDir().'/public/' . $uploadDirectory;
        $paintingName = uniqid() . '.' . $painting->guessExtension();
        $painting->move($path, $paintingName);
        return '/'. $uploadDirectory. '/' . $paintingName;
    }
}