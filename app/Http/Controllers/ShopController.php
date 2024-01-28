<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Owner;
use Illuminate\Http\Request;
use App\Http\Requests\ShopStore;
use App\Http\Requests\ShopUpdate;
use App\Interfaces\ShopInterface;

class ShopController extends Controller
{
    private $shopInterface;

    public function __construct(ShopInterface $shopInterface){
        $this->shopInterface=$shopInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shops = $this->shopInterface->all();
        return view('admin.shops.index',compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $owners = Owner::all();
        return view('admin.shops.create',compact('owners'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShopStore $request)
    {
        $data = $request->only(['name','image','owner_id','address','phone_number']);
        $this->shopInterface->store($data);
        return redirect('admin/shop');
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
        $owners = Owner::all();
        $shops = $this->shopInterface->findById($id);
        return view('admin.shops.edit',compact('owners','shops'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ShopUpate $request, string $id)
    {
        $this->shopInterface->update($id);
        return redirect('admin/shop');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->shopInterface->destroy($id);
        return redirect('admin/shop');
    }
}
