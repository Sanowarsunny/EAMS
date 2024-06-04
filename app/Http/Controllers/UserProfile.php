<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\Rollmanage;
use App\Models\Objectaccess;
use App\Models\Objecttorole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfile extends Controller
{
    public function UserProfileList(){
        $compayname   = Auth::user()->company_name;
        $UserProfile  = User::with('rollmanage')->where('company_name','=',$compayname)->get(); 
        $login        = Auth::user()->id;
        $access       = Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('manageobject_id', 'asc')->get();

        $userrole=Auth::user()->rollmanage_id;
        $roleaccess=Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();

        return view('pages.userProfilePage.user-profile-list',compact("UserProfile",'access','roleaccess'));
       
    }


    public function SystemUserProfileList(){
        $compayname   = Auth::user()->company_name;
        $UserProfile  = User::with('rollmanage')->where('rollmanage_id','>',-1)->get(); 
        //dd( $UserProfile);
        $login        = Auth::user()->id;
        $access       = Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('manageobject_id', 'asc')->get();

        $userrole=Auth::user()->rollmanage_id;
        $roleaccess=Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();

        return view('pages.userProfilePage.systemadmin-user-profile-list',compact("UserProfile",'access','roleaccess'));
       
    }
    

    public function UserProfileEdit($id)
    {
        $user =User::where('id',$id)->first();
        $companies=Company::all();
        $rollmanages  = Rollmanage::orderBy('name', 'asc')->get();
        $login=Auth::user()->id;
        $access = Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $userrole=Auth::user()->rollmanage_id;
        $roleaccess=Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();

        return view("pages.userProfilePage.user-profile-edit",compact("user",'access','companies','rollmanages','roleaccess'));
        
    }

    
    public function SystemUserProfileEdit($id)
    {
        $user =User::where('id',$id)->first();
        $companies=Company::all();
        $rollmanages  = Rollmanage::orderBy('name', 'asc')->get();
        $login=Auth::user()->id;
        $access = Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $userrole=Auth::user()->rollmanage_id;
        $roleaccess=Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();

        return view("pages.userProfilePage.systemadmin-user-profile-edit",compact("user",'access','companies','rollmanages','roleaccess'));
        
    }

    public function UserProfileUpate(Request $request)
    {
        $request->validate([
            'name'                  => 'required',
            'company_name'          => 'required',
            'rollmanage_id'         => 'required',
            'status'                => 'required',

        ]);

        $data                       = [];
        $data['name']               = $request->name;
        $data['email']              = $request->email;
        $data['company_name']       = $request->company_name;
        $data['rollmanage_id']      = $request->rollmanage_id;
        $data['status']             = $request->status;
       
        $user = User::where('id', $request->id)->limit(1)->update($data);

        if($user){
                    return redirect()->route('user_profile')->with('message','User Profile Updated Successfully');
                    
                }else{
                    return redirect()->back();
                }
    }


    public function SystemUserProfileUpate(Request $request)
    {
        $request->validate([
            'name'                  => 'required',
            'company_name'          => 'required',
            'rollmanage_id'         => 'required',
            'status'                => 'required',

        ]);

        $data                       = [];
        $data['name']               = $request->name;
        $data['email']              = $request->email;
        $data['company_name']       = $request->company_name;
        $data['rollmanage_id']      = $request->rollmanage_id;
        $data['status']             = $request->status;
       
       

        $user = User::where('id', $request->id)->limit(1)->update($data);

        if($user){
                    return redirect()->route('system_user_pofile')->with('message','User Profile Updated Successfully');
                    
                }else{
                    return redirect()->back();
                }
    }


}
