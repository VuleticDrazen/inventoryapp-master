<?php

namespace App\Http\Controllers;

use App\Exports\TicketExport;
use App\Exports\TicketInProgressExport;
use App\Http\Requests\TicketRequest;
use App\Models\EquipmentCategory;
use App\Models\Ticket;
use App\Models\TicketStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all();
        $content_header = "Ticket list";
        $breadcrumbs = [
            [ 'name' => 'Home', 'link' => '/' ],
            [ 'name' => 'Tickets list', 'link' => '/tickets' ],
        ];
        return view('tickets.index', compact(['tickets', 'content_header', 'breadcrumbs']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = EquipmentCategory::all();
        $content_header = "Add New Equipment";
        $breadcrumbs = [
            ['name' => 'Home', 'link' => '/'],
            ['name' => 'Equipment list', 'link' => '/equipment'],
            ['name' => 'New Equipment', 'link' => '/equipment/create'],
        ];
        return view('tickets.create', compact(['categories', 'content_header', 'breadcrumbs']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketRequest $request)
    {

        $request->merge(['user_id' => auth()->id() , 'status_id'=> '1']);
        Ticket::query()->create($request->all());
        return redirect(route('tickets.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        $content_header = "Ticket details";
        $breadcrumbs = [
            [ 'name' => 'Home', 'link' => '/' ],
            [ 'name' => 'Employees list', 'link' => '/users' ],
            [ 'name' => 'Tickets', 'link' => '/tickets' ],
        ];
        return view('tickets.show', compact(['content_header', 'breadcrumbs','ticket']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        $role = Auth::user()->role_id;
        $content_header = "Edit Ticket ";
        $breadcrumbs = [
            [ 'name' => 'Home', 'link' => '/' ],
            [ 'name' => 'Employees list', 'link' => '/users' ],
            [ 'name' => 'Tickets', 'link' => '/tickets/' ],
        ];
        return view('tickets.edit', compact(['content_header', 'breadcrumbs', 'ticket','role']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Ticket $ticket)
    {
        if(Auth::user()->role_id == 5){
            $ticket->update($request->only(['status_id']));

        }elseif (Auth::user()->id == $ticket->officer_id && $ticket->status_id == 1){
             $ticket->update($request->only(['status_id','expected_delivery_date','costs','admin_comment']));
        }else{
            $ticket->update($request->only(['delivered_at']));
        }

        return redirect('/tickets');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
    public function export()
    {
        return Excel::download(new TicketExport(), 'tickets.xlsx');
    }
    public function exportInProgress()
    {
        return Excel::download(new TicketInProgressExport(), 'ticketsInProgress.xlsx');
    }


}
