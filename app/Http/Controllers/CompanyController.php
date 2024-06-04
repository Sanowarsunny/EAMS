<?php

namespace App\Http\Controllers;

use File;
use App\Models\Company;
use Illuminate\Support\Str;
use App\Models\Objectaccess;
use App\Models\Objecttorole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class CompanyController extends Controller
{
    
    public function CompanyList(){
        $company=Company::orderBy('id', 'desc')->get();
        $login=Auth::user()->id; 
        $access = Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $userrole=Auth::user()->rollmanage_id;
        $roleaccess=Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();
        
        return view("pages.companyPages.company-list",compact("company", 'access','roleaccess'));
       
    }
    function CompanyPageView(Request $request){
        $company =Company::orderBy('id', 'desc')->get();
        $login=Auth::user()->id; 
        $access = Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

         $userrole=Auth::user()->rollmanage_id;
        $roleaccess=Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();

        return view("pages.companyPages.company-create",compact("company",'access','roleaccess' ));
        
    }

    public function CompanyStore(Request $request)
    {
        
        


        $data                   = [];
        $data['name']           = $request->name;
        $data['address']        = $request->address;
        $data['contctNo']       = $request->contctNo;
        $data['business']       = $request->business;
        $data['status']         = 'Active';
        $data['user_id']        = Auth::user()->id;
       
       

        $company = Company::insert($data);

        if($company)
        {
            return redirect()->route('company_View')->with('message','Company added Successfully');

        }else
        {
            return redirect()->back();
        }
    }

 
    
    public function CompanyEdit($id)
    {
        $company =Company::where('id',$id)->first();
        $login=Auth::user()->id; 
        $access = Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $userrole=Auth::user()->rollmanage_id;
        $roleaccess=Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();
        return view("pages.companyPages.company-edit",compact("company" , 'access','roleaccess'));
        
    }


    public function CompanyUpate(Request $request)
    {

        $data = [];
        $data['name'] = $request->name;
       
        $data['status'] = $request->status;

        $update = Company::where('id', $request->id)->limit(1)->update($data);

        if($update){
                    return redirect()->route('company_View')->with('message','Category Updated Successfully');
                    
                }else{
                    return redirect()->back();
                }
    }


    public function CompanyDelete($id){
        $company = Company::find($id)->delete();
        if($company){
            return redirect()->route('company_View')->with('message','Data deleted successfully');
        }else{
            return redirect()->back();
        }
    }


}
