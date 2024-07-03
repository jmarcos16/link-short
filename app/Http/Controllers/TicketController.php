<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TicketController extends Controller
{
    public function index()
    {
        return Inertia::render('Tickets/Index', [
            'tickets' => Ticket::query()
                ->when(request('search'), fn($query, $search) => $query->where('title', 'like', '%'.$search.'%'))
                ->paginate(10),
            'filters' => request()->all('search'),
        ]);
    }

    public function create()
    {
        return Inertia::render('Tickets/Create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Ticket $ticket)
    {
        //
    }

    public function edit(Ticket $ticket)
    {
        //
    }

    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    public function destroy(Ticket $ticket)
    {
        //
    }
}
