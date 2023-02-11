<?php

namespace App\Http\Controllers;

use App\Http\Resources\BrokersResource;
use App\Models\Broker;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBrokerRequest;

class BrokersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return \App\Models\Broker::all();
        return BrokersResource::collection(Broker::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrokerRequest $request)
    {
        $request->validated();

        $broker = Broker::create([
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'phone_number' => $request->phone_number,
            'logo_path' => $request->logo_path,
        ]);

        return new BrokersResource($broker);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Broker $broker)
    {
        return new BrokersResource($broker);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Broker $broker)
    {
        $broker->update($request->only([
            'name', 'address', 'city', 'zip_code', 'phone_number', 'logo_path'
        ]));

        return new BrokersResource($broker);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Broker $broker)
    {
        $broker->delete();

        return response()->json([
            "success" => true,
            "message" => "Selected broker has been deleted from the database"
        ]);
    }
}
