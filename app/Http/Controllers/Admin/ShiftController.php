<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Shift;
use App\Models\User;
use Illuminate\Http\Request;

class ShiftController extends Controller
{

    function __construct()
    {
        $this->middleware('role_or_permission:Toegang tot ploegendiensten|Ploegendienst maken|Ploegendienst bewerken|Ploegendienst verwijderen', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:Ploegendienst maken', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:Ploegendienst bewerken', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:Ploegendienst verwijderen', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = [];

        $shifts = Shift::with('user')->get();

        foreach ($shifts as $shift) {
            $events[] = [
                'title' => $shift->user->name,
                'start' => date('Y-m-d\TH:i:s', strtotime($shift->date . ' ' . $shift->start_time)),
                'end' => date('Y-m-d\TH:i:s', strtotime($shift->date . ' ' . $shift->finish_time)),
            ];
        }


        // dd($events);

        return view('setting.shifts.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('setting.shifts.new', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date_format:Y-m-d',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'user' => 'required|exists:users,id',
        ]);

        // Check for existing shift with the same user, date, and time
        $existingShift = Shift::where('user_id', $request->user)
            ->where('date', $request->date)
            ->where(function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('start_time', '<', $request->start_time)
                        ->where('finish_time', '>', $request->start_time);
                })->orWhere(function ($query) use ($request) {
                    $query->where('start_time', '<', $request->end_time)
                        ->where('finish_time', '>', $request->end_time);
                })->orWhere(function ($query) use ($request) {
                    $query->where('start_time', '>=', $request->start_time)
                        ->where('finish_time', '<=', $request->end_time);
                });
            })
            ->first();

        if ($existingShift) {
            return redirect()->back()->with('error', 'Er bestaat al een ploegendienst voor de geselecteerde gebruiker voor de opgegeven datum en tijd.');
        }

        // If no existing shift, create a new one
        $shift = new Shift;
        $shift->date = $request->date;
        $shift->start_time = $request->start_time;
        $shift->finish_time = $request->end_time;
        $shift->user_id = $request->user;
        $shift->save();

        return redirect()->route('admin.shifts.index')->with('success', 'Ploegendienst is succesvol aangemaakt.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Shift $shift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shift $shift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shift $shift)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shift $shift)
    {
        //
    }
}
