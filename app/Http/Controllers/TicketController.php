<?php

namespace App\Http\Controllers;

use App\Models\EquipmentCategory;
use App\Models\Ticket;
use App\Models\TicketStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            [ 'name' => 'Documents list', 'link' => '/documents' ],
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
    public function store(Request $request)
    {
        $ticket_request_type = $request->ticket_request_type;
        $ticket_type = $request->ticket_type;
        if($ticket_type == 1){
        switch ($ticket_request_type) {
            case '1':
                $officer_id = '1';
                break;
            case '2':
                $officer_id = '2';
                break;

            default:
                return '/';
                break;
        }
        }else{
            $officer_id = '3';
            }

        $request->merge(['user_id' => auth()->id() , 'status_id'=> '1', 'officer_id' => $officer_id]);
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

        $ticket->update($request->only(['status_id','expected_delivery_date','costs','admin_comment']));
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

}
