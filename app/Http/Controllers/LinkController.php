<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LinkController extends Controller
{

    public function index()
    {
        return Inertia::render('Links/Index', [
            'links' => Link::all(),
        ]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Link $link)
    {
    }

    public function edit(Link $link)
    {
    }

    public function update(Request $request, Link $link)
    {
    }

    public function destroy(Link $link)
    {
    }
}
