<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::get(['id','name','lastname','address','phone','email','dni','nro_customer']);

        return response()->json( ['Customer'=>$customers],200);
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
    public function store(Request $request)
    {
        $customer = [];
        $customer = Customer::where ('dni',$request->dni)->first();

        if(isset ($customer) ) {
            return response()->json(['message'=>'the dni alredy exist']);
        }

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->lastname = $request->lastname;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->dni = $request->dni;
        $customer->nro_customer = $request->nro_customer;

        $customer->save();

        $customers = Customer::get(['id','name','lastname','address','phone','email','dni','nro_customer'])
                             ->where('id',$customer->id);

        return response()->json( ['Customer'=>$customers],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $customer = Customer::find($id);
       return response()->json( ['Customer' =>$customer],200);
    }

    public function searchDni(Request $request)
    {
        $customer = Customer::where('dni',$request->dni)->first();
        return response()->json (['Customer' => $customer]);
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
    public function update(Request $request, $id)
    {

        $customer = Customer::find($id);


        $customer->name = $request->name;
        $customer->lastname = $request->lastname;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->dni = $request->dni;
        $customer->nro_customer = $request->nro_customer;

        $customer->save();
        return response()->json( ['Customer'=>$customer],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);

        $customer->delete();

        return response()->json(['message'=>'delete with removed']);
    }
}
