<?php

namespace App\Controllers;

use Core\Controller;

class NotesController extends Controller
{
    public function index() {}
    public function show(int $id) {}
    public function create() {}
    public function store() {}

    public function edit(int $id)
    {
        d(__CLASS__);
        d(__METHOD__);
    }

    public function update(int $id) {}
    public function destroy(int $id) {}
}