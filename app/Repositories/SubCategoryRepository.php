<?php

namespace App\Repositories;

use App\Models\SubCategory;
use App\Interfaces\SubCategoryInterface;


class SubCategoryRepository implements SubCategoryInterface
{
    public function all()
    {
        return SubCategory::all();
    }

    public function store()
    {
        $sub_category = new SubCategory();
        $sub_category->name = request()->name;
        $sub_category->save();
    }

    public function findById($id)
    {
        return SubCategory::findOrFail($id);
    }

    public function update($id)
    {
        $sub_category = $this->findById($id);
        $sub_category->name = request()->name;
        $sub_category->update();
    }

    public function destroy($id)
    {
        $sub_category = $this->findById($id);
        $sub_category->delete();
    }
}
