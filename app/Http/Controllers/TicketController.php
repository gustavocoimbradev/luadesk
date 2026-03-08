<?php

namespace App\Http\Controllers;

use App\Actions\Tickets\{CreateTicketAction, DeleteTicketAction, UpdateTicketAction};
use App\Http\Requests\{StoreTicketRequest, UpdateTicketRequest};
use Inertia\Inertia;
use App\Models\Ticket;
use Illuminate\Support\Facades\Gate; 

class TicketController extends Controller
{

    public function index() { 
        Gate::authorize('viewAny', Ticket::class);
        return Inertia::render('Tickets/Index', [
            'tickets' => Ticket::viewedBy(auth()->user())
                ->with(['user','answers'])
                ->latest()
                ->get()
        ]);
    } 
 
    public function show(Ticket $ticket) {
        Gate::authorize('view', $ticket);
        $ticket->load(['user','answers.user']);
        return Inertia::render('Tickets/Show', ['ticket' => $ticket]); 
    }
    
    public function create() {
        Gate::authorize('create', Ticket::class);
        return Inertia::render('Tickets/Create');
    }
    
    public function store(StoreTicketRequest $request, CreateTicketAction $action) {
        Gate::authorize('create', Ticket::class);
        if ($action($request->validated())) {
            return to_route('tickets.index')->with('success', 'Ticket created successfully!');
        }
        return redirect()->back()->withError('Failed to create ticket.');
    }
 
    public function update(UpdateTicketRequest $request, Ticket $ticket, UpdateTicketAction $action) {
        Gate::authorize('update', $ticket);
        $action($ticket, $request->validated());
    }

    public function destroy(Ticket $ticket, DeleteTicketAction $action) {
        Gate::authorize('delete', $ticket);
        $action($ticket);
    }

}
