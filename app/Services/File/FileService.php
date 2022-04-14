<?php

namespace App\Services\File;

use App\Repositories\File\FileRepository;
use App\Services\Service;

class FileService extends Service
{
    public function __construct(FileRepository $fileRepository)
    {
        $this->repository = $fileRepository;
    }



}
