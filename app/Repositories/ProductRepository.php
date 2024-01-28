<?php

namespace App\Repositories;

use App\Interfaces\ProductInterface;
use App\Models\Product;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class ProductRepository implements ProductInterface
{
    public function all()
    {
        return Product::all();
    }

    public function store()
    {
        $product = new Product();
        $product->shop_id = request()->shop_id;
        $product->category_id = request()->category_id;
        $product->name = request()->name;
        $product->description = request()->description;

        $imageName = time().'.'.request()->image->extension();
        request()->image->move(public_path('images'),$imageName);

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

        $product= $this->findById($id);
        $product->shop_id = request()->shop_id;
        $product->category_id = request()->category_id;
        $product->name = request()->name;
        $product->description = request()->description;

        // Save the image to the public/images directory
        if(request()->hasFile('images')){

            // dd(request()->images);
            $imageName = time().'.'.request()->images->extension();
            // dd(pubic_path("images/$product->images"));
            // dd(public_path());
            if(File::exists(public_path("images/$product->image"))){
                // dd('hi');
                File::delete(public_path("images/$product->image"));
            }
            // dd('no');

            request()->images->move(public_path('images'),$imageName);

            $product->image = $imageName;
        }
        else{

            $product->image = $product->image;

            }




        // $path = Storage::disk('public')->putFileAs('images', request()->file('image'), $imageName);


        // Save only the image file name (not the full path) in the database
        // $product->image = $imageName;

        $product->price = request()->price;
        $product->update();
    }

    public function destroy($id)
    {
        $product = $this->findById($id);
        File::delete(public_path("images/$product->image"));
        $product->delete();
    }
}
