<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Interfaces\SubCategoryInterface;
use App\Http\Requests\SubCategoryStore;
use App\Http\Requests\SubCategoryUpdate;

class SubCategoryController extends Controller
{
    private $sub_categoryInterface;

    public function __construct(SubCategoryInterface $sub_categoryInterface){
        $this->sub_categoryInterface=$sub_categoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sub_categories = $this->sub_categoryInterface->all();
        return view('admin.sub_categories.index',compact('sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sub_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubCategoryStore $request)
    {
        $data = $request->only(['name']);
        $this->sub_categoryInterface->store($data);
        return redirect('admin/sub_category');
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
        $sub_categories = $this->sub_categoryInterface->findById($id);
        return view('admin.sub_categories.edit',compact('sub_categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubCategoryUpdate $request, string $id)
    {
        $this->sub_categoryInterface->update($id);
        return redirect('admin/sub_category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->sub_categoryInterface->destroy($id);
        return redirect('admin/sub_category');
    }
}
