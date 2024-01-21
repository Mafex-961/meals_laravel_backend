<?php

namespace App\Repositories;

use App\Models\Admin;
use App\Interfaces\AdminInterface;
use Illuminate\Support\Facades\Hash;

class AdminRepository implements AdminInterface
{
    public function all()
    {
       return Admin::all();
    }

    public function store()
    {
        $admin = new Admin();
        $admin->name = request()->name;
        $admin->email = request()->email;
        $admin->password =Hash::make(request()->password);
        $admin->save();
    }

    public function findById($id)
    {
        return Admin::findOrFail($id);
    }

    public function update($id)
    {
        $admin = $this->findById($id);
        $admin->name = request()->name;
        $admin->email = request()->email;
        $admin->password =Hash::make(request()->password);
        $admin->update();
    }

    public function destroy($id)
    {
        $admin = $this->findById($id);
        $admin->delete();
    }
}
