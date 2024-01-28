<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\OwnerInterface;
use App\Models\Owner;
use App\Http\Requests\OwnerStore;
use App\Http\Requests\OwnerUpdate;

class OwnerController extends Controller
{
    private $ownerInterface;

    public function __construct(OwnerInterface $ownerInterface){
        $this->ownerInterface=$ownerInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $owners = $this->ownerInterface->all();
        return view('admin.owners.index',compact('owners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.owners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OwnerStore $request)
    {
        $data = $request->only(['name','email','password']);
        $this->ownerInterface->store($data);
        return redirect('admin/owner');
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
        $owners = $this->ownerInterface->findById($id);
        return view('admin.owners.edit',compact('owners'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OwnerUpdate $request, string $id)
    {
        $this->ownerInterface->update($id);
        return redirect('admin/owner');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->ownerInterface->destroy($id);
        return redirect('admin/owner');
    }
}
