<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rollmanage;
use App\Models\Manageobject;
use App\Models\Objectaccess;
use App\Models\Objecttorole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ObjecttoroleController extends Controller
{
    public function ObjectToRoleView(Request $request)
    {
        $compayname=Auth::user()->company_name;

        $checkboxItems = Manageobject::all(); // Fetch all checkbox items from the database
        $allobjects =Manageobject::all(); // Fetch all checkbox items from the database
        $user= User::where('status','Active')->where('company_name','=',$compayname)->get();
        $login=Auth::user()->id;
        $role =Rollmanage::where('status','Active')->get();
        $access = Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $objectToRole = DB::table('object_to_role')->get();
       
        $userrole=Auth::user()->rollmanage_id;
        $roleaccess=Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();

        return view('pages.objectToRolePages.objectToRole-create',compact('checkboxItems','user','access','objectToRole','allobjects','role','roleaccess'));
    }


    public function ObjectToRoleStore(Request $request)
    {
        $parentId = $request->input('rollmanage_id');
    
        if($parentId==null){
            // return 'Please choose a person';
            return redirect()->back()->with('alert', 'Please choose a Role');
              
        }else{
            $validatedData = $request->validate([
                'rollmanage_id.*' => 'required|string',
                'manageobject_id.*' => 'required|string',
            ]);

            // Store each selected checkbox item
            foreach ($validatedData['manageobject_id'] as $item) {
                Objecttorole::create([
                    'manageobject_id' => $item,
                    'rollmanage_id' => $parentId,
                ]);
            }
            return redirect()->back()->with('message', 'Role stored successfully.');
        }
    }

}
