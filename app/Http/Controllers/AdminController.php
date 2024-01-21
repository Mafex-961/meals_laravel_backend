<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\AdminInterface;
use App\Models\Admin;
use App\Http\Requests\AdminStore;
use App\Http\Requests\AdminUpdate;

class AdminController extends Controller
{
    private $adminInterface;

    public function __construct(AdminInterface $adminInterface){
        $this->adminInterface=$adminInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = $this->adminInterface->all();
        return view('admin.admin2.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admin2.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminStore $request)
    {
        $data = $request->only(['name','email','password']);
        $this->adminInterface->store($data);
        return redirect('admin/admin');
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
    public function edit(AdminUpdate $request , string $id)
    {
        $admins = $this->adminInterface->findById($id);
        return view('admin.admin2.edit',compact('admins'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->adminInterface->update($id);
        return redirect('admin/admin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->adminInterface->destroy($id);
        return redirect('admin/admin');
    }
}
