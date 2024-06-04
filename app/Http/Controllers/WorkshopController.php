<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Workshop;
use App\Models\Objectaccess;
use App\Models\Objecttorole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkshopController extends Controller
{
    
    function workshopList(Request $request){
       
        $company        =Company::where('name','=',Auth::user()->company_name)->get();
        $workshop       =Workshop::with('company')->orderBy('id', 'desc')->get();
        
        $login          =Auth::user()->id; 
        $access         =Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $userrole       =Auth::user()->rollmanage_id;
        $roleaccess     =Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();

        return view("pages.workshopPages.workshop-list",compact("company",'access' ,'roleaccess','workshop'));
        
        
    }
    
    
    function workshopView(Request $request){
       
        $company        =Company::where('name','=',Auth::user()->company_name)->get();
        $workshop       =Workshop::with('company')->orderBy('id', 'desc')->get();

        
        $login          =Auth::user()->id; 
        $access         =Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $userrole       =Auth::user()->rollmanage_id;
        $roleaccess     =Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();

        return view("pages.workshopPages.workshop-create",compact("company",'access' ,'roleaccess','workshop'));
        
    }


    public function workshopStore(Request $request)
    {
       
        $request->validate([
            'name'         => 'required',
            'address'      => 'required|max:255',
            'contact_no'    => 'required|max:40',
        ]);

        $data                   = [];
        $data['name']           = $request->name;
        $data['address']        = $request->address;
        $data['contact_no']      = $request->contact_no;
     
        $data['company_id']     = $request->company_id;
       
       

        $Workshop = Workshop::insert($data);

        if($Workshop)
        {
            return redirect()->route('workshop-view')->with('message','Workshop added Successfully');

        }else
        {
            return redirect()->back();
        }
    }


    public function workshopEdit($id)
    {
       
        $workshop  =Workshop::with('company')->where('id',$id)->first();
        
        $login          =Auth::user()->id; 
        $access         = Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $userrole=Auth::user()->rollmanage_id;
        $roleaccess=Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();

        return view("pages.workshopPages.workshop-edit",compact('access','roleaccess','workshop' ));
        
    }


    public function workshopUpate(Request $request)
    {

        $request->validate([
            'name'         => 'required',
            'address'      => 'required|max:255',
            'contact_no'    => 'required|max:40',
        ]);

        $data                   = [];
        $data['name']           = $request->name;
        $data['address']        = $request->address;
        $data['contact_no']      = $request->contact_no;
     
      
       

       
       
        $update = Workshop::where('id', $request->id)->limit(1)->update($data);

        if($update){
                    return redirect()->route('workshop-view')->with('message','Workshop Updated Successfully');
                    
                }else{
                    return redirect()->back();
                }
    }


    public function workshopDelete($id){
        $result = Workshop::find($id)->delete();
        if($result){
            return redirect()->route('workshop-view')->with('message','Data deleted successfully');
        }else{
            return redirect()->back();
        }
    }

}
