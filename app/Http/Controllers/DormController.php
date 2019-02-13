<?php

namespace App\Http\Controllers;

use App\Dorm;
use Illuminate\Http\Request;

class DormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dorms.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCreateForm()
    {
        return view('dorms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function doSaveProcess(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dorm  $Dorm
     * @return \Illuminate\Http\Response
     */
    public function showDormInformation(Dorm $Dorm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dorm  $Dorm
     * @return \Illuminate\Http\Response
     */
    public function showUpdateForm(Dorm $Dorm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dorm  $Dorm
     * @return \Illuminate\Http\Response
     */
    public function doUpdateProcess(Request $request, Dorm $Dorm)
    {
        //
    }

    /**
     * Toggles the Status of the specified resource from storage.
     *
     * @param  \App\Dorm  $Dorm
     * @return \Illuminate\Http\Response
     */
    public function toggleStatus(Dorm $Dorm)
    {
        //
    }

    /**
     * Fetches all the records from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getAllDormData(Request $request)
    {
        $data = array();
        $dorms = Dorm::all();


        foreach($dorms as $dorm) {
            $entry = array();
            $entry['ID'] = $dorm->ID;
            $entry['Name'] = $dorm->Name;
            $entry['Owner'] = $dorm->getOwner()->getFullName();
            $entry['Address'] = sprintf("%s, %s, %s", $dorm->AddressLine1, $dorm->AddressLine2, $dorm->City);
            $entry['Mobile'] = $dorm->MobileNumber;
            $entry['LandLine'] = $dorm->LandLineNumber;

            array_push($data, $entry);
        }


//        <th class="sorting_asc">Name</th>
//        <th class="sorting">Owner</th>
//        <th class="sorting">Address</th>
//        <th class="sorting">Mobile #</th>
//        <th class="sorting">Landline #</th>
//        <th class="sorting"># of Rooms</th>
//        <th class="disabled-sorting">Actions</th>
        return response()->json(['aaData'=>$data]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dorm  $dorm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dorm $dorm)
    {
        //
    }
}
