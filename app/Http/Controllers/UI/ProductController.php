<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Carbon;


class ProductController extends Controller
{
    public function index()
    {
        // dd('hi');
        $products = Product::all();
        return view('product', compact('products'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function cart()
    {
        return view('cart');
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

public function checkout(){
    // dd('hi');
    $cart = session()->get('cart');

        $date = Carbon::now()->format('d-m-Y');


        $order = new Order();
        $order->date = $date;
        $order->save();

        foreach($cart as $id=> $details){
            // dd( $details);
            $orderdetails = new OrderDetail();
            $orderdetails->product_id = $id;
            $orderdetails->order_id = $order->id;
            $orderdetails->name = $details['name'];
            $orderdetails->quantity = $details['quantity'];
            $orderdetails->price = $details['price'];
            $orderdetails->image = $details['image'];
            $orderdetails->save();

        }
        session()->forget('cart');
        return redirect('UI/product');
}

}
