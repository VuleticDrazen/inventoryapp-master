<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\EquipmentCategory;
use App\Models\Ticket;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $role = Auth::user()->role_id;

        switch ($role) {

            case '1':
                $categories = EquipmentCategory::query()
                    ->whereHas('available_equipment')
                    ->with('available_equipment')
                    ->get();
                $tickets = Ticket::all();
                return view('super_admin_dashboard', compact(['categories','tickets']));
                break;

            case '2':
                $tickets = Ticket::query()
                    ->where('officer_id', '', Auth::user()->id)
                    ->get();
                return view('office_manager_dashboard', compact(['tickets']));
                break;

            case '3':
                $tickets = Ticket::query()
                    ->where('officer_id', '', Auth::user()->id)
                    ->get();
                return view('support_manager_dashboard', compact(['tickets']));
                break;

            case '4':
                $documents = Document::query()
                    ->where('user_id' , auth()->id())
                    ->get();
                $tickets = Ticket::query()
                    ->where('user_id', '', Auth::user()->id)
                    ->get();
                return view('user_dashboard', compact(['documents','tickets']));
                break;

            case '5':
                $tickets = Ticket::query()->open();
                return view('hr_manager_dashboard', compact(['tickets']));
                break;

            default:
                return '/users';
                break;
        }

    }
}
