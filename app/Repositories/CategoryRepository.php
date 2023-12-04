<?php

namespace App\Repositories;

use App\Interfaces\CategoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryInterface
{
    public function all(){

        return Category::all();
    }

    public function store(){

        $category = new Category();
        $category->name = request()->name;
        $category->save();
    }

    public function findById($id){

        return Category::findOrFail($id);
    }

    public function update($id){

        $category= $this->findById($id);
        $category->name = request()->name;
        $category->update();
    }

    public function destroy($id){
        $category= $this->findById($id);
        $category->delete();
    }
}

