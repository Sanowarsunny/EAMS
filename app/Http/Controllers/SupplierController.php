<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Supplier;
use App\Models\Objectaccess;
use App\Models\Objecttorole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    

    function supplierList(Request $request){
       
        $company        =Company::where('name','=',Auth::user()->company_name)->get();
        $supplier       =Supplier::with('company','user')->orderBy('id', 'desc')->get();
        
        $login          =Auth::user()->id; 
        $access         =Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $userrole       =Auth::user()->rollmanage_id;
        $roleaccess     =Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();

        return view("pages.supplierPages.supplier-list",compact("company",'access' ,'roleaccess','supplier'));
        
    }
    
    
    function supplierView(Request $request){
       
        $company        =Company::where('name','=',Auth::user()->company_name)->get();
        $supplier       =Supplier::with('company','user')->orderBy('id', 'desc')->get();
        
        $login          =Auth::user()->id; 
        $access         =Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $userrole       =Auth::user()->rollmanage_id;
        $roleaccess     =Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();

        return view("pages.supplierPages.supplier-create",compact("company",'access' ,'roleaccess','supplier'));
        
    }


    public function supplierStore(Request $request)
    {
       
        $request->validate([
            'name'         => 'required',
            'address'      => 'required|max:255',
            'contactno'    => 'required|max:40',
        ]);

        $data                   = [];
        $data['name']           = $request->name;
        $data['address']        = $request->address;
        $data['contactno']      = $request->contactno;
        $data['email']          = $request->email;
        $data['website']        = $request->website;
        $data['company_id']     = $request->company_id;
        $data['user_id']        = Auth::user()->id;
       

        $supplier = Supplier::insert($data);

        if($supplier)
        {
            return redirect()->route('supplier-view')->with('message','supplier added Successfully');

        }else
        {
            return redirect()->back();
        }
    }


    public function supplierEdit($id)
    {
       
        $supplier  =Supplier::with('company')->where('id',$id)->first();
        
        $login          =Auth::user()->id; 
        $access         = Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $userrole=Auth::user()->rollmanage_id;
        $roleaccess=Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();

        return view("pages.supplierPages.supplier-edit",compact('access','roleaccess','supplier' ));
        
    }


    public function supplierUpate(Request $request)
    {

        $request->validate([
            'name'         => 'required',
            'address'      => 'required|max:255',
            'contactno'    => 'required|max:40',
        ]);

        $data                   = [];
        $data['name']           = $request->name;
        $data['address']        = $request->address;
        $data['contactno']      = $request->contactno;
        $data['email']          = $request->email;
        $data['website']        = $request->website;
       

       
       
        $update = Supplier::where('id', $request->id)->limit(1)->update($data);

        if($update){
                    return redirect()->route('supplier-view')->with('message','Supplier Updated Successfully');
                    
                }else{
                    return redirect()->back();
                }
    }


    public function supplierDelete($id){
        $result = Supplier::find($id)->delete();
        if($result){
            return redirect()->route('supplier-view')->with('message','Data deleted successfully');
        }else{
            return redirect()->back();
        }
    }

}
