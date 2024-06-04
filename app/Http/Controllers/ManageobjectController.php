<?php

namespace App\Http\Controllers;

use App\Models\Manageobject;
use App\Models\Objectaccess;
use App\Models\Objecttorole;
use App\Models\Systemmodule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageobjectController extends Controller
{
    public function ObjectList(){
       $Manageobject=Manageobject::orderBy('name', 'asc')->get();
       $login=Auth::user()->id; 
       $access = Objectaccess::with('user','manageobject')
       ->where('user_id','=', $login)
       ->orderBy('user_id', 'asc')->get();

        $userrole=Auth::user()->rollmanage_id;
        $roleaccess=Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();
        
       return view('pages.objectPages.object-list',compact('Manageobject','access','roleaccess'));   
    }

    function ObjectView(Request $request){
        $Manageobject=Manageobject::orderBy('name', 'asc')->get();
        $modulelist =Systemmodule::all();
        $login=Auth::user()->id; 
        
        $access = Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $userrole=Auth::user()->rollmanage_id;
        $roleaccess=Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();

        return view('pages.objectPages.object-create',compact('Manageobject','access','roleaccess','modulelist'));
    }

    public function ObjectStore(Request $request)
    {
       
        $data                   = [];
        $data['name']           = $request->name;
        $data['description']    = $request->description;
        $data['module']         = $request->module;
        $data['status']         = 'Active';
       

        $Manageobject=Manageobject::insert($data);

        if($Manageobject)
        {
            return redirect()->route('object-view')->with('message','Manageobject added Successfully');

        }else
        {
            return redirect()->back();
        }
    }


    public function ObjectEdit($id)
    {
        $Manageobject   =Manageobject::where('id',$id)->first();
        $modulelist     =Systemmodule::all();
        $login          =Auth::user()->id; 
        $access         = Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $userrole       =Auth::user()->rollmanage_id;
        $roleaccess     =Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();

       return view('pages.objectPages.object-edit',compact('Manageobject','access','roleaccess','modulelist'));
    }

    public function ObjectUpate(Request $request)
    {

        $request->validate([
            'name'            => 'required',
            'description'     => 'required',
            'module'          => 'required',
           
        ]);


        $data = [];
        $data['name'] = $request->name;
        $data['description'] = $request->description;
        $data['module'] = $request->module;
        $data['status'] = $request->status;

        $update = Manageobject::where('id', $request->id)->limit(1)->update($data);

        if($update){
                    return redirect()->route('object-view')->with('message','Manageobject Updated Successfully');
                    
                }else{
                    return redirect()->back();
                }
    }

    public function ObjectDelete($id){
        $result = Manageobject::find($id)->delete();
        if($result){
            return redirect()->route('object-view')->with('message','Data deleted successfully');
        }else{
            return redirect()->back();
        }
    }
}
