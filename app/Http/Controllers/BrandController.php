<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Objectaccess;
use App\Models\Objecttorole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    public function BrandList(){
        $brand=Brand::orderBy('id', 'desc')->get();
        $login=Auth::user()->id; 
        $access = Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $userrole=Auth::user()->rollmanage_id;
        $roleaccess=Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();

        return view("pages.brandPages.brand-list",compact("brand",'access','roleaccess'));
       
    }
    function BrandPageView(Request $request){
        $company =Brand::get();
        $brand=Brand::orderBy('id', 'desc')->get();
        $login=Auth::user()->id; 
       
        $access = Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();
       
        $userrole=Auth::user()->rollmanage_id;
        $roleaccess=Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();
        //dd( $userrole);
        return view("pages.brandPages.brand-create",compact("brand","access",'roleaccess'));
        
    }

    public function BrandStore(Request $request)
    {
       
        $data                   = [];
        $data['name']           = $request->name;
       
        $brand = Brand::insert($data);

        if($brand)
        {
            return redirect()->route('BrandPageView')->with('message','Brand added Successfully');

        }else
        {
            return redirect()->back();
        }
    }

 
    
    public function BrandEdit($id)
    {
        $brand =Brand::where('id',$id)->first();
        $login=Auth::user()->id; 
        $access = Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $userrole=Auth::user()->rollmanage_id;
        $roleaccess=Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();

        return view("pages.brandPages.brand-edit",compact("brand",'access','roleaccess'));
        
    }


    public function BrandUpate(Request $request)
    {

        $data = [];
        $data['name'] = $request->name;
       
       

        $update = Brand::where('id', $request->id)->limit(1)->update($data);

        if($update){
                    return redirect()->route('BrandPageView')->with('message','brand Updated Successfully');
                    
                }else{
                    return redirect()->back();
                }
    }


    public function BrandDelete($id){
        $result = Brand::find($id)->delete();
        if($result){
            return redirect()->route('BrandPageView')->with('message','Data deleted successfully');
        }else{
            return redirect()->back();
        }
    }
}

