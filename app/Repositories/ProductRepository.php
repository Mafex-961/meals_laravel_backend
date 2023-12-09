<?php

namespace App\Repositories;

use App\Interfaces\ProductInterface;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;


class ProductRepository implements ProductInterface
{
    public function all()
    {
        return Product::all();
    }

    public function store()
    {


        $imageName = time().'.'.request()->image->extension();

        $product = new Product();
        $product->category_id = request()->category_id;
        $product->name = $imageName;
        $product->description = request()->description;

        $path = Storage::disk('public')->putFileAs('images', request()->file('image'), $imageName);

        // Save only the image file name (not the full path) in the database
        $product->image = $imageName;

        $product->price = request()->price;
        $product->save();
    }

    public function findById($id)
    {
        return Product::findOrFail($id);
    }

    public function update($id)
    {
        $imageName = time().'.'.request()->image->extension();

        $product= $this->findById($id);
        $product->category_id = request()->category_id;
        $product->name = $imageName;
        $product->description = request()->description;

        // Save the image to the public/images directory
        $path = Storage::disk('public')->putFileAs('images', request()->file('image'), $imageName);

        // Save only the image file name (not the full path) in the database
        $product->image = $imageName;

        $product->price = request()->price;
        $product->update();
    }

    public function destroy($id)
    {
        $product = $this->findById($id);
        $product->delete();
    }
}
