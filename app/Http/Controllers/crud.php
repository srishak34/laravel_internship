<?php

namespace App\Http\Controllers;
use App\Supplier;
use DB;
use Illuminate\Http\Request;

class crud extends Controller
{
    
    public function index(Request $request)
    {
        $search = $request -> input('search');
        $supplier = Supplier::orderBy('idSupplier', 'asc')      
                            ->search($search)
                            ->paginate(10);

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
        $suppliers = new Supplier;

        $suppliers -> name = $request -> name ;
        $suppliers -> address = $request -> address ;
        $suppliers -> zip = $request -> code ;
        $suppliers -> region = $request -> region ;
        $suppliers -> city = $request -> city ;
        $suppliers -> country = $request -> country ;
        $suppliers -> phone = $request -> number ;
        $suppliers -> email = $request -> email ;

        $suppliers -> save();

        

        return redirect()->route('dashboard.index');
    }

    
    public function edit($id)
    {

    }
    

    
    public function update(Request $request)
    {
        

        $update = Supplier::findOrFail($request -> id_supplier);

        $update -> update($request-> all());

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
        Supplier::whereIn('idSupplier',explode(",",$ids))
        ->delete();
        return response()->json(['success'=>"Products Deleted successfully."]);
    }
}
