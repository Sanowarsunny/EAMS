<?php

namespace App\Http\Controllers;

use App\Models\Objectaccess;
use App\Models\Objecttorole;
use Illuminate\Http\Request;
use App\Models\Managincommittee;
use Illuminate\Support\Facades\Auth;

class ManagincommitteeController extends Controller
{
    public function CommitteeList(){
        $Managincommittee=Managincommittee::orderBy('id', 'desc')->get();
        $login=Auth::user()->id;
        $access = Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $userrole=Auth::user()->rollmanage_id;
        $roleaccess=Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();

        return view("pages.CommitteePages.committee-list",compact("Managincommittee",'access','roleaccess'));
       
    }

    function CommitteeView(Request $request){
        $login=Auth::user()->id;
        $access = Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();
        $Managincommittee=Managincommittee::orderBy('id', 'desc')->get();

        $userrole=Auth::user()->rollmanage_id;
        $roleaccess=Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();
        
        return view("pages.CommitteePages.committee-create",compact("Managincommittee",'access','roleaccess'));   
    }

    public function CommitteeStore(Request $request)
    {
        $request->validate([
            'name'                  => 'required',
            'address'               => 'required',
            'contctNo'              => 'required',
            'position'              => 'required',
            'duration'              => 'required',

        ]);

        $data                       = [];
        $data['name']               = $request->name;
        $data['address']            = $request->address;
        $data['contctNo']           = $request->contctNo;
        $data['position']           = $request->position;
        $data['duration']           = $request->duration;
        $data['user_id']            = Auth::user()->id;
       
        $Managincommittee = Managincommittee::insert($data);

        if($Managincommittee)
        {
            return redirect()->route('CommitteeView')->with('message','Managincommittee added Successfully');

        }else
        {
            return redirect()->back();
        }
    }


 
    public function CommitteeEdit($id)
    {
        $Managincommittee =Managincommittee::where('id',$id)->first();
        $login=Auth::user()->id;
        $access = Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $userrole=Auth::user()->rollmanage_id;
        $roleaccess=Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();

        return view("pages.CommitteePages.committee-edit",compact("Managincommittee",'access','roleaccess'));
        
    }

     public function CommitteeUpate(Request $request)
    {
        $request->validate([
            'name'                  => 'required',
            'address'               => 'required',
            'contctNo'              => 'required',
            'position'              => 'required',
            'duration'              => 'required',

        ]);

        $data                       = [];
        $data['name']               = $request->name;
        $data['address']            = $request->address;
        $data['contctNo']           = $request->contctNo;
        $data['position']           = $request->position;
        $data['duration']           = $request->duration;
       
       

        $Managincommittee = Managincommittee::where('id', $request->id)->limit(1)->update($data);

        if($Managincommittee){
                    return redirect()->route('CommitteeView')->with('message','Managincommittee Updated Successfully');
                    
                }else{
                    return redirect()->back();
                }
    }


    public function CommitteeDelete($id){
        $result = Managincommittee::find($id)->delete();
        if($result){
            return redirect()->route('CommitteeView')->with('message','Data deleted successfully');
        }else{
            return redirect()->back();
        }
    }

}
