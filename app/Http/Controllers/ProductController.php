<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\ProductInterface;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    private $ProductInterface;

    public function __construct(ProductInterface $ProductInterface)
    {
        $this->ProductInterface=$ProductInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->ProductInterface->all();
        return view('admin.products.index',compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->ProductInterface->store();
        return redirect('product');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $categories = Category::all();
        $products =$this->ProductInterface->findById($id);
        return view('admin.products.edit',compact('categories','products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd(request()->all());
        $this->ProductInterface->update($id);
        return redirect('product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->ProductInterface->destroy($id);
        return redirect('product');
    }
}
