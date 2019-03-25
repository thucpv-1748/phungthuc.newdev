<?php

namespace App\Repositories;

use App\Model\Category;

use App\Repositories\Contracts\CategoryInterface;

class CategoryRepository extends BaseRepository implements CategoryInterface
{
    public function __construct(Category $category)
    {
        parent::__construct($category);
    }
}
