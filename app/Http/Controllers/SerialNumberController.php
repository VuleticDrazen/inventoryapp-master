<?php

namespace App\Http\Controllers;

use App\Models\SerialNumber;
use App\Models\Equipment;
use App\Http\Requests\SerialNumberRequest;
use Illuminate\Http\Request;

class SerialNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SerialNumberRequest $request, Equipment $equipment)
    {
        $attributes = $request->validated();
        $attributes['equipment_id'] = $equipment->id;

        SerialNumber::create($attributes);

        return redirect()->route('equipment.show', $equipment->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SerialNumber  $serialNumber
     * @return \Illuminate\Http\Response
     */
    public function show(SerialNumber $serialNumber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SerialNumber  $serialNumber
     * @return \Illuminate\Http\Response
     */
    public function edit(SerialNumber $serialNumber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SerialNumber  $serialNumber
     * @return \Illuminate\Http\Response
     */

    public function update(SerialNumberRequest $request, Equipment $equipment, SerialNumber $serialNumber)
    {
        $attributes = $request->validated();

        $serialNumber->update($attributes);

        return redirect()->route('equipment.show', $equipment->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SerialNumber  $serialNumber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipment $equipment, SerialNumber $serialNumber)
    {
        if ( ! $serialNumber->is_used) {
            $serialNumber->delete();
        }
        return redirect()->route('equipment.show', $equipment->id);
    }

    public function all(Equipment $equipment){

    }

}
