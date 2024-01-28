<?php

namespace App\Interfaces;

interface OwnerInterface
{
    public function all();

    public function store();

    public function findById($id);

    public function update($id);

    public function destroy($id);
}
