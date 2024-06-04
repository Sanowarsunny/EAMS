<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Category;
use App\Models\Categorytype;
use App\Models\Objectaccess;
use App\Models\Objecttorole;
use Illuminate\Http\Request;
use App\Models\Categorymodel;
use Illuminate\Support\Facades\Auth;

class CategorymodelController extends Controller
{
    public function CategoryModelList(){
        $categorymodel=Categorymodel::with('categorytype')->orderBy('id', 'desc')->get();
        $categorytypes  =Categorytype::get();
        $login=Auth::user()->id; 
        $access = Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $userrole=Auth::user()->rollmanage_id;
        $roleaccess=Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();
        
        return view("pages.categoryModelPages.categorymodel-list",compact("categorymodel",'access','roleaccess','categorytypes'));
       
    }

    function CategoryModelPageView(Request $request){
        $company        =Company::get();
        $categorymodel  =Categorymodel::with('categorytype')->orderBy('id', 'desc')->get();
        $categorytypes  =Categorytype::get();
        $login          =Auth::user()->id; 
        $access         =Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $userrole       =Auth::user()->rollmanage_id;
        $roleaccess     =Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();

        return view("pages.categoryModelPages.categorymodel-create",compact("company","categorymodel",'access' ,'roleaccess','categorytypes'));
        
    }

    public function CategoryModelStore(Request $request)
    {
       
        $request->validate([
            'name'               => 'required',
            'description'        => 'required',
            'categorytype_id'    => 'required',
           

        ]);

        $data                       = [];
        $data['name']               = $request->name;
        $data['description']        = $request->description;
        $data['categorytype_id']    = $request->categorytype_id;
       

        $categorymodel = Categorymodel::insert($data);

        if($categorymodel)
        {
            return redirect()->route('category-model-view')->with('message','Sub Category added Successfully');

        }else
        {
            return redirect()->back();
        }
    }

    public function CategoryModelEdit($id)
    {
       
        $categorymodel  =Categorymodel::with('categorytype')->where('id',$id)->first();
        $categorytypes  =Categorytype::get();

        $login          =Auth::user()->id; 
        $access         = Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $userrole=Auth::user()->rollmanage_id;
        $roleaccess=Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();

        return view("pages.categoryModelPages.categorymodel-edit",compact('access','roleaccess' ,'categorymodel' ,'categorytypes'));
        
    }

    public function CategoryModelUpate(Request $request)
    {

        $request->validate([
            'name'               => 'required',
            'description'        => 'required',
            'categorytype_id'    => 'required',   
        ]);

        $data                       = [];
        $data['name']               = $request->name;
        $data['description']        = $request->description;
        $data['categorytype_id']    = $request->categorytype_id;
       
       
        $update = Categorymodel::where('id', $request->id)->limit(1)->update($data);

        if($update){
                    return redirect()->route('category-model-view')->with('message','SubCategory Updated Successfully');
                    
                }else{
                    return redirect()->back();
                }
    }


    public function CategoryModelDelete($id){
        $result = Categorymodel::find($id)->delete();
        if($result){
            return redirect()->route('category-model-view')->with('message','Data deleted successfully');
        }else{
            return redirect()->back();
        }
    }
}
