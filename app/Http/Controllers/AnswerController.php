<?php

namespace App\Http\Controllers;

use App\Actions\Answers\CreateAnswerAction;
use App\Http\Requests\StoreAnswerRequest;
use App\Models\Ticket;
use Illuminate\Support\Facades\Gate;

class AnswerController extends Controller
{
     
    public function store(StoreAnswerRequest $request, Ticket $ticket, CreateAnswerAction $action) {
        Gate::authorize('create', $ticket);
        $action($request->validated(), $ticket);
        return to_route('tickets.show', $ticket);
    }

}
