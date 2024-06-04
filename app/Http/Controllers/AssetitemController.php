<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Company;
use App\Models\Assetitem;
use App\Models\Objectaccess;
use App\Models\Objecttorole;
use Illuminate\Http\Request;
use App\Models\Categorymodel;
use Illuminate\Support\Facades\Auth;

class AssetitemController extends Controller
{
    

    function assetList(Request $request){
       
        $company        =Company::where('name','=',Auth::user()->company_name)->get();
        $assetitem      =Assetitem::with('company','user','brand','categorymodel')->orderBy('id', 'desc')->get();
        $brand          =Brand::orderBy('name', 'asc')->get();
        $categorymodel  =Categorymodel::orderBy('name', 'asc')->get();
        $login          =Auth::user()->id; 
        $access         =Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $userrole       =Auth::user()->rollmanage_id;
        $roleaccess     =Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();

        return view("pages.assetItemPages.assetitem-list",compact("company",'access' ,'roleaccess','assetitem'));
        
    }
    
    
    function assetView(Request $request){
       
        $company        =Company::where('name','=',Auth::user()->company_name)->get();
        $assetitem       =Assetitem::with('company','user','brand','categorymodel')->orderBy('id', 'desc')->get();
        
        $brand          =Brand::orderBy('name', 'asc')->get();
        $categorymodel  =Categorymodel::orderBy('name', 'asc')->get();
        
        $login          =Auth::user()->id; 
        $access         =Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $userrole       =Auth::user()->rollmanage_id;
        $roleaccess     =Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();

        return view("pages.assetItemPages.assetitem-create",compact("company",'access' ,'roleaccess','assetitem','brand','categorymodel'));
        
    }


    public function asseyStore(Request $request)
    {
       
        $request->validate([
            
            'asset_no'              => 'required|unique:assetitems|max:255',
            'manufacture_no'        => 'required|unique:assetitems|max:255',
            'gov_registration_no'   => 'unique:assetitems|max:255',
            'chassis_no'            => 'unique:assetitems|max:255',
            'enginee_no'            => 'unique:assetitems|max:255',
            
        ]);

        $data                           = [];
        $data['asset_no']               = $request->asset_no;
        $data['manufacture_no']         = $request->manufacture_no;
        $data['gov_registration_no']    = $request->gov_registration_no;
        $data['chassis_no']             = $request->chassis_no;
        $data['enginee_no']             = $request->enginee_no;
        $data['stock_sts']              = "Stock in hand";
        $data['categorymodel_id']       = $request->categorymodel_id;
        $data['brand_id']               = $request->brand_id;
        $data['company_id']             = $request->company_id;
        $data['user_id']                = Auth::user()->id;
       

        $assetitem = Assetitem::insert($data);

        if($assetitem)
        {
            return redirect()->route('asset_view')->with('message','supplier added Successfully');

        }else
        {
            return redirect()->back();
        }
    }


    public function assetEdit($id)
    {
       
        $assetitem  =Assetitem::with('company')->where('id',$id)->first();
        $brand          =Brand::orderBy('name', 'asc')->get();
        $categorymodel  =Categorymodel::orderBy('name', 'asc')->get();
        $login          =Auth::user()->id; 
        $access         = Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $userrole=Auth::user()->rollmanage_id;
        $roleaccess=Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();

        return view("pages.assetItemPages.assetitem-edit",compact('access','roleaccess','assetitem' ,'brand','categorymodel'));
        
    }


    public function assetUpate(Request $request)
    {


        $data                           = [];
        $data['asset_no']               = $request->asset_no;
        $data['manufacture_no']         = $request->manufacture_no;
        $data['gov_registration_no']    = $request->gov_registration_no;
        $data['chassis_no']             = $request->chassis_no;
        $data['enginee_no']             = $request->enginee_no;
        $data['stock_sts']              = "Stock in hand";
        $data['categorymodel_id']       = $request->categorymodel_id;
        $data['brand_id']               = $request->brand_id;
       
       
       
        $update = Assetitem::where('id', $request->id)->limit(1)->update($data);

        if($update){
                    return redirect()->route('asset_view')->with('message','Supplier Updated Successfully');
                    
                }else{
                    return redirect()->back();
                }
    }


    public function assetDelete($id){
        $result = Assetitem::find($id)->delete();
        if($result){
            return redirect()->route('asset_view')->with('message','Data deleted successfully');
        }else{
            return redirect()->back();
        }
    }

}
