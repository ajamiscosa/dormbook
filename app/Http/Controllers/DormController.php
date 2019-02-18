<?php

namespace App\Http\Controllers;

use App\Dorm;
use App\User;
use Illuminate\Http\Request;

class DormController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

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
        $user = new User();
        $user->Username = User::GenerateUsernameForDormitoryUser($request->Name);
        $user->Password = "1234";
        $user->EmailAddress = "default@email.com";
        $user->Name = $request->Owner;
        $user->save();

        $dorm = new Dorm();
        $dorm->Name = $request->Name;
        $dorm->Owner = $user->ID;
        $dorm->AddressLine1 = $request->AddressLine1;
        $dorm->AddressLine2 = $request->AddressLine2;
        $dorm->City = $request->City;
        $dorm->Zip = $request->Zip;
        $dorm->Rate = $request->Rate;
        $dorm->Rooms = $request->Rooms;
        $dorm->MobileNumber = $request->MobileNumber;
        $dorm->LandLineNumber = $request->LandLineNumber;
        $dorm->BusinessPermit = $request->BusinessPermit;
        $dorm->Latitude = $request->Latitude;
        $dorm->Longitude = $request->Longitude;
        $dorm->save();

        return redirect()->to('/dorm');
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
    public function showUpdateForm($Dorm)
    {
        $temp = explode('-',$Dorm);
        $dorm = new Dorm();
        $dorm = $dorm->where('ID','=',$temp[0])->first();
        return view('dorms.update', ['data'=>$dorm]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dorm  $Dorm
     * @return \Illuminate\Http\Response
     */
    public function doUpdateProcess(Request $request, Dorm $dorm)
    {
        $temp = json_decode('['.implode(',',$request->Amenities).']',true);
        $amenities = json_encode($temp);

        $dorm->AddressLine1 = $request->AddressLine1;
        $dorm->AddressLine2 = $request->AddressLine2;
        $dorm->City = $request->City;
        $dorm->Zip = $request->Zip;
        $dorm->Rate = $request->Rate;
        $dorm->Rooms = $request->Rooms;
        $dorm->MobileNumber = $request->MobileNumber;
        $dorm->LandLineNumber = $request->LandLineNumber;
        $dorm->BusinessPermit = $request->BusinessPermit;
        $dorm->Latitude = $request->Latitude;
        $dorm->Longitude = $request->Longitude;
        $dorm->Amenities = $amenities;
        $dorm->save();

        return redirect()->to('/dorm');
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
            $entry['Owner'] = $dorm->getOwner()->Name;
            $entry['Address'] = sprintf("%s, %s, %s", $dorm->AddressLine1, $dorm->AddressLine2, $dorm->City);
            $entry['Mobile'] = $dorm->MobileNumber;
            $entry['Rooms'] = $dorm->Rooms;

            array_push($data, $entry);
        }
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

    public function showSearchForm() {
        return view('search');
    }

    public function testAmenities(Request $request) {
        dd($request);
    }
}
