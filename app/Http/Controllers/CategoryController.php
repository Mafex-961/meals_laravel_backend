<?php

namespace App\Http\Controllers;
use App\Interfaces\CategoryInterface;
use Illuminate\Http\Request;



class CategoryController extends Controller
{


    private $categoryInterface;

    public function __construct(CategoryInterface $categoryInterface){
        $this->categoryInterface=$categoryInterface;
    }

    

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd($categories);
        $categories = $this->categoryInterface->all();
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->categoryInterface->store();
        return redirect('category');
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
        $categories = $this->categoryInterface->findById($id);
        return view('admin.categories.edit',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->categoryInterface->update($id);
        return redirect('category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->categoryInterface->destroy($id);
        return redirect('category');
    }
}
