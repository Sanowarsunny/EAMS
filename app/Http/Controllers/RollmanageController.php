<?php

namespace App\Http\Controllers;

use App\Models\Rollmanage;
use App\Models\Objectaccess;
use App\Models\Objecttorole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RollmanageController extends Controller
{
    public function RollList(){
        $roll=Rollmanage::orderBy('id', 'desc')->get();
        $login=Auth::user()->id;
        $access = Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $userrole=Auth::user()->rollmanage_id;
        $roleaccess=Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();
        
        return view("pages.rollPages.roll-list",compact("roll",'access' ,'roleaccess'));
       
    }

    function RollPageView(Request $request){
      
        $roll=Rollmanage::orderBy('id', 'desc')->get();
        $login=Auth::user()->id;
        $access = Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $userrole=Auth::user()->rollmanage_id;
        $roleaccess=Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();

        return view("pages.rollPages.roll-create",compact("roll",'access','roleaccess'));
        
    }


    public function RollStore(Request $request)
    {
       
        $data                   = [];
        $data['name']           = $request->name;
        $data['status']         = 'Active';
       

        $roll = Rollmanage::insert($data);

        if($roll)
        {
            return redirect()->route('roll-view')->with('message','Roll added Successfully');

        }else
        {
            return redirect()->back();
        }
    }

    public function RollEdit($id)
    {
        $roll =Rollmanage::where('id',$id)->first();
        $login=Auth::user()->id;
        $access = Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $userrole=Auth::user()->rollmanage_id;
        $roleaccess=Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();

        return view("pages.rollPages.roll-edit",compact("roll",'access','roleaccess'));
        
    }

    public function RollUpate(Request $request)
    {

        $data = [];
        $data['name'] = $request->name;
       
        $data['status'] = $request->status;

        $update = Rollmanage::where('id', $request->id)->limit(1)->update($data);

        if($update){
                    return redirect()->route('roll-view')->with('message','Roll Updated Successfully');
                    
                }else{
                    return redirect()->back();
                }
    }

    public function RollDelete($id){
        $result = Rollmanage::find($id)->delete();
        if($result){
            return redirect()->route('roll-view')->with('message','Data deleted successfully');
        }else{
            return redirect()->back();
        }
    }

}
