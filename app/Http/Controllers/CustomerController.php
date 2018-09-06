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
        $customers = Customer::orderBy('id', 'asc')->get();
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $places = $this->getPlace();
        $hobbies = $this->getHobby();
        return view('customers.create', compact('places', 'hobbies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'name' => 'required',
          'date'=> 'required|integer',
        ]); 
        
        $customers= new Customer();
        $customers->name=$request->get('name');
        $customers->date=$request->get('date');
        $customers->place=$request->get('place');
        $customers->gender=$request->get('gender');
        $hobby = implode(",", $request->get('option'));
        $customers->hobby = $hobby; 
        $customers->save();
        return redirect('/customer')->with('success', 'Customer has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $places = $this->getPlace();
        $hobbies = $this->getHobby();
        $customer = Customer::findOrFail($id);
        $cust_hobby = explode(",", $customer->hobby);
        return view('customers.edit', compact('customer', 'places', 'hobbies', 'cust_hobby'));
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
        $request->validate([
          'name' => 'required',
          'date'=> 'required|integer',
        ]); 
        
        $customers= Customer::findOrFail($id);
        $customers->name=$request->get('name');
        $customers->date=$request->get('date');
        $customers->place=$request->get('place');
        $customers->gender=$request->get('gender');
        $hobby = implode(",", $request->get('option'));
        $customers->hobby = $hobby; 
        $customers->save();
        return redirect('/customer')->with('success', 'Customer has been updated');
    }

    public function getPlace()
    {
        return ["Yangon", "Mandalay", "Bago"];
    }

    public function getHobby()
    {
        return ["Drawing", "Cooking", "Travelling"];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect('/customer')->with('success', 'Customer Name : '.$customer->name.' has been deleted');
    }
}
