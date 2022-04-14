<?php

namespace App\Repositories\Post;

use App\Models\Post;
use App\Models\PostTranslation;
use App\Models\ViewPost;
use App\Repositories\Repository;

class PostRepository extends Repository
{
    public function __construct(Post $post, ViewPost $viewPost, PostTranslation $postTranslation)
    {
        $this->model = $post;
        $this->modelView = $viewPost;
        $this->modelTranslation = $postTranslation;
    }
}
