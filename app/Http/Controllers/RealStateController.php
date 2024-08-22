<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RealEstate;
use Validator;
class RealStateController extends Controller
{


       
    
    public function index()
    {
        $realEstates = RealEstate::select('id', 'city', 'name')->where('deleted_at',null)->get();
       
    
        if($realEstates){
            return response()->json([
              
                'data' => $realEstates,
                'message'=> 'List is Fetched',
            ]);
        }

        else{
            return response()->json([
              
                'data' => null,
                'message'=> 'List is Not Fetched',
            ]);
        }
    }
    
    public function store(Request $request)
    {


            $rules = [
           'name' => 'required|string',
           'real_state_type' => 'required|string',
            'street' => 'required|string',
           'external_number' => 'required|string',
           'internal_number' => 'required|string',
           'neighborhood' => 'required|string',
          'city' => 'required|string',
            
          'country' => 'required|integer',
          'rooms' => 'required|integer',
          'bathrooms' => 'required|integer',
          'comments' => 'required|string',
         ];
    
        $validator = Validator::make($request->all(), $rules);
    
         if ($validator->fails()) {
          return response()->json($validator->errors(), 422);
        }
    
        // Create an instance of RealEstate and assign values
        $realEstate = new RealEstate();
        $realEstate->name = $request->name;
        $realEstate->real_state_type = $request->real_state_type;
        $realEstate->street = $request->street;
        $realEstate->external_number = $request->external_number;
        $realEstate->internal_number = $request->internal_number ?? null;
        $realEstate->neighborhood = $request->neighborhood;
        $realEstate->city = $request->city;
        $realEstate->country = $request->country;
        $realEstate->rooms = $request->rooms;
        $realEstate->bathrooms = $request->bathrooms;
        $realEstate->comments = $request->comments ?? null;
    
        // Save the instance to the database
        $realEstate->save();

        
    if($realEstate){
        $data['message']= 'Successfully Store';
        $data['status']= true;
        return response()->json(['data'=>$data], 200);
    }else{
        $data['message']= 'Failtd Store';
        $data['status']= false;
        return response()->json('', 401);
    }
        // Return the newly created record in the response with a 201 status
        
    
}


public function destroy($id)
{
    $realEstate = RealEstate::findOrFail($id);
    $realEstate->delete();

    if($realEstate){
        $data['message']= 'Successfully Delete';
        $data['status']= true;
        return response()->json(['data'=>$data], 200);
    }else{
        $data['message']= 'Failtd Delete';
        $data['status']= false;
        return response()->json('', 401);
    }
}







public function update(Request $request ,$id)
{


        $rules = [
       'name' => 'required|string',
       'real_state_type' => 'required|string',
        'street' => 'required|string',
       'external_number' => 'required|string',
       'internal_number' => 'required|string',
       'neighborhood' => 'required|string',
      'city' => 'required|string',
        
      'country' => 'required|integer',
      'rooms' => 'required|integer',
      'bathrooms' => 'required|integer',
      'comments' => 'required|string',
     ];

    $validator = Validator::make($request->all(), $rules);

     if ($validator->fails()) {
      return response()->json($validator->errors(), 422);
    }

    // Create an instance of RealEstate and assign values
    $realEstate = RealEstate::findOrFail($id);
    $realEstate->name = $request->name;
    $realEstate->real_state_type = $request->real_state_type;
    $realEstate->street = $request->street;
    $realEstate->external_number = $request->external_number;
    $realEstate->internal_number = $request->internal_number ?? null;
    $realEstate->neighborhood = $request->neighborhood;
    $realEstate->city = $request->city;
    $realEstate->country = $request->country;
    $realEstate->rooms = $request->rooms;
    $realEstate->bathrooms = $request->bathrooms;
    $realEstate->comments = $request->comments ?? null;

    // Save the instance to the database
    $realEstate->save();

    
if($realEstate){
    $data['message']= 'Successfully Update';
    $data['status']= true;
    return response()->json(['data'=>$data], 200);
}else{
    $data['message']= 'Failtd Store';
    $data['status']= false;
    return response()->json('', 401);
}
    // Return the newly created record in the response with a 201 status
    

}

public function deletedlist()
{
    // Retrieve only soft-deleted records
    $realEstates = RealEstate::onlyTrashed()->select('id', 'city', 'name')->get();
    if($realEstates){
    return response()->json([
        'data' => $realEstates,
        'message'=> 'List is Fetched',
    ]);
}else{
    return response()->json([
          
        'data' => null,
        'message'=> 'List is Not Fetched',
    ]);
}
}


 
public function show($id)
    {
        $realEstates = RealEstate::select('id','name','real_state_type','street','external_number','external_number','neighborhood','country','rooms','bathrooms','comments', 'city', 'name')->where('id',$id)->get();
       
    if($realEstates){
        return response()->json([
          
            'data' => $realEstates,
            'message'=> 'List is Fetched',
        ]);
    }else{
        return response()->json([
          
            'data' => null,
            'message'=> 'List is Not Fetched',
        ]);
    }
    }

}
