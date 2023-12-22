<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\Api\CategoryInterface;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryInterface;

    public function __construct(CategoryInterface $categoryInterface)
    {
        $this->categoryInterface=$categoryInterface;
    }

    public function all()
    {
       
        $categories = $this->categoryInterface->all();
        // dd($categories);
        return CategoryResource::collection($categories);
        // return response()->json(['data'=> $categories,'status'=>200]);
        // dd($categories);
    }

    public function getCategoryById($id)
    {
    //    dd($id);
        $category = $this->categoryInterface->getCategoryById($id);
        // dd($category);
        return new CategoryResource($category);
        // dd($category);
        // return CategoryResource::collection($category);
    }

}
