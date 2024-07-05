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
                ->latest()
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
        $request->validate([
            'title' => ['required', 'max:255'],
            'content' => ['required'],
        ]);

        Ticket::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('tickets.index');
    }

    public function show(Ticket $ticket)
    {
        return Inertia::render('Tickets/Show', [
            'ticket' => $ticket->load('user', 'assignedTo'),
        ]);
    }

    public function edit(Ticket $ticket)
    {
        // return Inertia::render('Tickets/Edit', [
        //     'ticket' => $ticket,
        // ]);
    }

    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'title' => ['required', 'max:255'],
            'content' => ['required'],
        ]);

        $ticket->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('tickets.index');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('tickets.index');
    }
}
