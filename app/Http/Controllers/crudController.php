<?php

namespace App\Http\Controllers;
use App\Supplier;
use DB;
use Illuminate\Http\Request;
use Session;

class crudController extends Controller
{
    
    public function index(Request $request)
    {
        $search = $request -> input('search');
        $supplier = Supplier::orderBy('id', 'asc')      
                            ->search($search)
                            ->paginate(5);

        return view('/home', compact('supplier', 'search'));
        
    }

    public function show($id)
    {
        //
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $this -> validate($request, [
            'name' => 'required',
            'address' => 'required',
            'code' => 'required',
            'region' => 'required',
            'city' => 'required',
            'country' => 'required',
            'number' => 'required',
            'email' => 'required',
            'c_title' => 'required',
            'c_name' => 'required',
            'fax' => 'required'
        ]);

        $suppliers = new Supplier;

        $suppliers -> name = $request -> name ;
        $suppliers -> address = $request -> address ;
        $suppliers -> postal_code = $request -> code ;
        $suppliers -> zip_code = $request -> code ;
        $suppliers -> region = $request -> region ;
        $suppliers -> city = $request -> city ;
        $suppliers -> country = $request -> country ;
        $suppliers -> contact_phone = $request -> number ;
        $suppliers -> contact_email = $request -> email ;
        $suppliers -> contact_title = $request -> c_title ;
        $suppliers -> contact_name = $request -> c_name ;
        $suppliers -> contact_fax = $request -> fax ;

        $suppliers -> save();

        Session::flash('success', 'Supplier Has Been Successfully Added.');

        return redirect()->route('dashboard.index');
    }

    
    public function edit($id)
    {

    }
    

    
    public function update(Request $request)
    {
        $this -> validate($request, [
            'name' => 'required',
            'address' => 'required',
            'code' => 'required',
            'region' => 'required',
            'city' => 'required',
            'country' => 'required',
            'number' => 'required',
            'email' => 'required',
            'c_title' => 'required',
            'c_name' => 'required',
            'fax' => 'required'
        ]);

        $id = $request -> name;

        $update = Supplier::findOrFail($request -> id_supplier);

        $update -> update($request-> all());

        Session::flash('u_success','Supplier ' . $id . ' Has Been Updated.');

        return back();
    }

    
    public function destroy($id)
    {
        $data = Supplier::find($id);
        $data -> delete();

        return redirect()->route('dashboard.index');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        Supplier::whereIn('id',explode(",",$ids))
        ->delete();
        return response()->json(['success'=>"Products Deleted successfully."]);
    }
}
