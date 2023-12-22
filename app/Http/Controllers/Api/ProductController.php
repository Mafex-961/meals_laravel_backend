<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\Api\ProductInterface;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productInterface;

    public function __construct(productInterface $productInterface)
    {
        $this->productInterface=$productInterface;
    }

    public function all()
    {
        $products = $this->productInterface->all();
        // dd($products);
        return ProductResource::collection($products);
    }

    public function getProductById($id)
    {
        $product = $this->productInterface->getProductById($id);
        return new ProductResource($product);
    }
}


