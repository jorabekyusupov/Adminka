<?php

namespace App\Repositories\File;

use App\Models\File;
use  App\Repositories\Repository;

class FileRepository extends Repository
{
    public function __construct(File $file)
    {
        $this->model = $file;
    }

}
