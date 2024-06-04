<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Category;
use App\Models\Categorytype;
use App\Models\Objectaccess;
use App\Models\Objecttorole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategorytypeController extends Controller
{
    public function SubCategoryList(){
        $category=Category::orderBy('id', 'desc')->get();
        $categorytypes  =Categorytype::with('category')->orderBy('id', 'desc')->get();
        $login=Auth::user()->id; 
        $access = Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $userrole=Auth::user()->rollmanage_id;
        $roleaccess=Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();
        
        return view("pages.categoryTypePages.categorytype-list",compact("category",'access','roleaccess','categorytypes'));
       
    }
    
    
    function SubCategoryPageView(Request $request){
        $company        =Company::get();
        $category       =Category::orderBy('id', 'desc')->get();
        $categorytypes  =Categorytype::with('category')->orderBy('id', 'desc')->get();
        $login          =Auth::user()->id; 
        $access         = Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $userrole       =Auth::user()->rollmanage_id;
        $roleaccess     =Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();

        return view("pages.categoryTypePages.categorytype-create",compact("company","category",'access' ,'roleaccess','categorytypes'));
        
    }


    public function SubCategoryStore(Request $request)
    {
       
        $request->validate([
            'name'               => 'required',
            'category_id'    => 'required',
           

        ]);


        $data                   = [];
        $data['name']           = $request->name;
        $data['category_id']    = $request->category_id;
       

        $subcategory = Categorytype::insert($data);

        if($subcategory)
        {
            return redirect()->route('sub-category-view')->with('message','Sub Category added Successfully');

        }else
        {
            return redirect()->back();
        }
    }


    public function SubCategoryEdit($id)
    {
       
        $category       =Category::orderBy('id', 'desc')->get();
        $categorytypes  =Categorytype::with('category')->where('id',$id)->first();
        $login          =Auth::user()->id; 
        $access         = Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();


        $userrole=Auth::user()->rollmanage_id;
        $roleaccess=Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();

        return view("pages.categoryTypePages.categorytype-edit",compact('access','roleaccess' ,'category' ,'categorytypes'));
        
    }

    public function SubCategoryUpate(Request $request)
    {

        $data = [];
        $data['name'] = $request->name;
        $data['category_id'] = $request->category_id;
       
       
        $update = Categorytype::where('id', $request->id)->limit(1)->update($data);

        if($update){
                    return redirect()->route('sub-category-view')->with('message','SubCategory Updated Successfully');
                    
                }else{
                    return redirect()->back();
                }
    }


    public function SubCategoryDelete($id){
        $result = Categorytype::find($id)->delete();
        if($result){
            return redirect()->route('sub-category-view')->with('message','Data deleted successfully');
        }else{
            return redirect()->back();
        }
    }

}
