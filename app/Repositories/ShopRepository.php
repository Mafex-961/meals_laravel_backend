<?php

namespace App\Repositories;

use App\Interfaces\ShopInterface;
use App\Models\Shop;
use Illuminate\Support\Facades\File;



class ShopRepository implements ShopInterface
{
 public function all()
 {
    return Shop::all();
 }

 public function store()
 {
    $shop = new Shop();
    $shop->name = request()->name;

    $imageName = time().'.'.request()->image->extension();
        request()->image->move(public_path('images'),$imageName);

        // Save only the image file name (not the full path) in the database
        $shop->image = $imageName;

    $shop->owner_id = request()->owner_id;
    $shop->address = request()->address;
    $shop->phone_number = request()->phone_number;
    $shop->save();
 }

 public function findById($id)
 {
    return Shop::findOrFail($id);
 }

 public function update($id)
 {
    $shop = $this->findById($id);

    $shop->name = request()->name;

    if(request()->hasFile('images')){

        // dd(request()->images);
        $imageName = time().'.'.request()->images->extension();
        // dd(pubic_path("images/$product->images"));
        // dd(public_path());
        if(File::exists(public_path("images/$shop->image"))){
            // dd('hi');
            File::delete(public_path("images/$shop->image"));
        }
        // dd('no');

        request()->images->move(public_path('images'),$imageName);

        $shop->image = $imageName;
    }
    else{

        $shop->image = $shop->image;

        }


    $shop->owner_id = request()->owner_id;
    $shop->address = request()->address;
    $shop->phone_number = request()->phone_number;
    $shop->update();


 }

 public function destroy($id)
    {
        $shop = $this->findById($id);
        File::delete(public_path("images/$shop->image"));
        $shop->delete();
    }
}
