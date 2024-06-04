<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\Manageobject;
use App\Models\Objectaccess;
use App\Models\Objecttorole;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\alert;
use Illuminate\Support\Facades\Auth;
use App\Models\Objectaccesstocompany;

class ObjectaccessController extends Controller
{
    function ObjectView(Request $request){
        $login=Auth::user()->id;
        $sidebaraccess = Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $userrole=Auth::user()->rollmanage_id;
        $roleaccess=Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();
        
        return view('admin.inc.sidebar',compact('sidebaraccess','roleaccess'));
    }

    public function ObjectAccessView(Request $request)
    {
        $compayname=Auth::user()->company_name;

        $checkboxItems = Manageobject::all(); // Fetch all checkbox items from the database
        $accesstocompany =DB::table('object_access_to_company')->where('company_name','=',$compayname)->get(); // Fetch all checkbox items from the database
        $user= User::where('status','Active')->where('company_name','=',$compayname)->get();
        $login=Auth::user()->id;

        $access = Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $accessed = DB::table('objec_accessed')->where('company_name','=',$compayname)->get();
       
        $userrole=Auth::user()->rollmanage_id;
        $roleaccess=Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();

        return view('pages.objectAccessPages.objectAccess-create', compact('checkboxItems','user','access','accessed','accesstocompany','roleaccess'));
    }


    public function SystemadminObjectAccessView(Request $request)
    {
        $compayname=Auth::user()->company_name;
       
        $checkboxItems = Manageobject::all(); // Fetch all checkbox items from the database
        $user= User::where('status','Active')->get();
        $login=Auth::user()->id;

        $access = Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();


        $accessed = DB::table('objec_accessed')->get();

        $userrole=Auth::user()->rollmanage_id;
        $roleaccess=Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();
       
        return view('pages.objectAccessPages.systemdmin-objectAccess-create', compact('checkboxItems','user','access','accessed','roleaccess'));
    }

    public function ObjectAcessToCompanyView(Request $request)
    {
        $compayname=Company::all();
       
        $checkboxItems = Manageobject::all(); // Fetch all checkbox items from the database
        $user= User::where('status','Active')->get();
        $login=Auth::user()->id;

        $access = Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();


        $accessed = DB::table('objec_accessed')->get();
        $access_to_company = DB::table('object_access_to_company')
        // ->where('company_name','=', Auth::user()->company_name)
        ->get();
       
        $userrole=Auth::user()->rollmanage_id;
        $roleaccess=Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();

        return view('pages.objectAccessPages.objectAccessToCompany-create', compact('checkboxItems','user','access','accessed','compayname','access_to_company','roleaccess'));
    }
    

    public function ObjectAccessStore(Request $request)
    {
        $parentId = $request->input('user_id');
    
        if($parentId==null){
            // return 'Please choose a person';
            return redirect()->back()->with('alert', 'Please choose a person');
              
        }else{
            $validatedData = $request->validate([
                'user_id.*' => 'required|string',
                'manageobject_id.*' => 'required|string',
            ]);

            // Store each selected checkbox item
            foreach ($validatedData['manageobject_id'] as $item) {
                Objectaccess::create([
                    'manageobject_id' => $item,
                    'user_id' => $parentId,
                ]);
            }
            return redirect()->back()->with('message', 'Items stored successfully.');
        }
    }


    

    

    public function SystemadminObjectAccessStore(Request $request)
    {
        $parentId = $request->input('user_id');
    
        if($parentId==null){
            // return 'Please choose a person';
            return redirect()->back()->with('alert', 'Please choose a person');
              
        }else{
            $validatedData = $request->validate([
                'user_id.*' => 'required|string',
                'manageobject_id.*' => 'required|string',
            ]);

            // Store each selected checkbox item
            foreach ($validatedData['manageobject_id'] as $item) {
                Objectaccess::create([
                    'manageobject_id' => $item,
                    'user_id' => $parentId,
                ]);
            }
            return redirect()->back()->with('message', 'Items stored successfully.');
        }
    }


    public function ObjectAccessToCompanyStore(Request $request)
    {
        $parentId = $request->input('company_id');
    
        if($parentId==null){
            // return 'Please choose a person';
            return redirect()->back()->with('alert', 'Please choose a Company');
              
        }else{
            $validatedData = $request->validate([
                'company_id.*' => 'required|string',
                'manageobject_id.*' => 'required|string',
            ]);

            // Store each selected checkbox item
            foreach ($validatedData['manageobject_id'] as $item) {
                Objectaccesstocompany::create([
                    'manageobject_id' => $item,
                    'company_id' => $parentId,
                ]);
            }
            return redirect()->back()->with('message', 'Items stored successfully.');
        }
    }





    public function ObjectAccessEdit($id)
    {
        $alreadyaccessed =Objectaccess::where('id',$id)->first();

        $login=Auth::user()->id;

      

        $access = Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $userrole=Auth::user()->rollmanage_id;
        $roleaccess=Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();

        return view("pages.objectAccessPages.objectAccess-edit",compact('access','alreadyaccessed','roleaccess'));
        
    }
   
    
}
