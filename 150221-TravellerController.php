<?php

namespace App\Http\Controllers;

use App\Models\traveller;
use App\Models\place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class TravellerController extends Controller
{
    public function index()
    {
        $traveller = traveller::all();
        return response()->json(['message'=>'Request Index Success','data'=>$traveller],200);
    }
    public function store(Request $request)
    {
        $travellerValidator = $this->validateTraveller();
        if($travellerValidator->fails()) {
            return response()->json(['message'=>'Validation Failed', 'address'=>$travellerValidator->messages()], 400);
        }
        $traveller = traveller::create($request->all());
        return response()->json($traveller,201);
    }

    //Showing specific traveller
    public function show_traveller(traveller $traveller)
    {
        return response()->json(['message'=>'','data'=>$traveller],200);
    }

    public function update(Request $request, traveller $traveller)
    {
        $travellerValidator = $this->validateTraveller();
        if($travellerValidator->fails) {
            return response()->json(['message'=>'Validation Failed', 'address'=>$travellerValidator->messages()], 400);
        }

        $traveller->TravellerName = $request->TravellerName;
        $traveller->TravellerPaspport = $request->TravellerPassport;
        $traveller->TravellerAge = $request->TravellerAge;
        $traveller->TravellerDOB = $request->TravellerDOB;
        if($traveller->save()) {
            return response()->json(['message'=>'Traveller Data Updated','data'=>$traveller], 200);
        }
            return response()->json(['message'=>'Traveller Update Failed','data'=>null],400);
    }

    public function delete(traveller $traveller)
    {
        if($traveller->delete()) {
            return response()->json(['message'=>'Traveller Data Deleted.','data'=>null], 200);
        }
            return response()->json(['message'=>'Error Deleting Traveller Record.','data'=>null], 400);
    }

    public function order_flight(Request $request, traveller $traveller, place $place)
    {
        $Note = '';
        if ($request->Note) {
            $Note = $request->Note;
        }
        if ($traveller->places()->save($place, array('note' => $Note))) {
            return response()->json(['message'=>'Flight Order Created', 'data'=>$traveller],200);
        }
        return response()->json(['message'=>'Error when Ordering Flight', 'data'=>null],400);
    }

    public function validateTraveller() {
        return Validator::make(request()->all(), [
            'TravellerName' => 'required|min:3|max:255',
            'TravellerPassport' => 'required|min:7|max:7',
            'TravellerAge' => 'required|max:2',
            'TravellerDOB' => 'required'
        ]);
    }
}
