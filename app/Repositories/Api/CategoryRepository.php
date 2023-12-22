<?php

namespace App\Repositories\Api;

use App\Interfaces\Api\CategoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryInterface
{
    public function all()
    {
        return Category::all();
    }

    public function getCategoryById($id)
    {
        return Category::findOrFail($id);
    }
}
