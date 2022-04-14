<?php

namespace App\Services\Post;

use App\Repositories\Post\PostRepository;
use App\Services\Service;

class PostService extends Service
{
    public function __construct(PostRepository $postRepository)
    {
        $this->repository = $postRepository;
    }

}
