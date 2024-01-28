<?php

namespace App\Repositories;

use App\Models\Owner;
use App\Interfaces\OwnerInterface;
use Illuminate\Support\Facades\Hash;

class OwnerRepository implements OwnerInterface
{
    public function all()
    {
        return Owner::all();
    }

    public function store()
    {
        $owner = new Owner();
        $owner->name = request()->name;
        $owner->email = request()->email;
        $owner->password =Hash::make(request()->password);
        $owner->save();
    }

    public function findById($id)
    {
        return Owner::findOrFail($id);
    }

    public function update($id)
    {
        $owners = $this->findById($id);
        $owners->name = request()->name;
        $owners->email = request()->email;
        $owners->password =Hash::make(request()->password);
        $owners->update();
    }

    public function destroy($id)
    {
        $owners = $this->findById($id);
        $owners->delete();
    }
}
