<?php


namespace App\Http\Controllers;
use Exception;
use App\Models\Company;
use App\Models\Category;
use App\Models\Objectaccess;
use App\Models\Objecttorole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function CategoryList(){
        $category=Category::orderBy('id', 'desc')->get();
        $login=Auth::user()->id; 
        $access = Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $userrole=Auth::user()->rollmanage_id;
        $roleaccess=Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();
        
        return view("pages.categoryPages.category-list",compact("category",'access','roleaccess'));
       
    }
    function CategoryPageView(Request $request){
        $company =Company::get();
        $category=Category::orderBy('id', 'desc')->get();
        $login=Auth::user()->id; 
        $access = Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $userrole=Auth::user()->rollmanage_id;
        $roleaccess=Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();

        return view("pages.categoryPages.category-create",compact("company","category",'access' ,'roleaccess'));
        
    }

    public function CategoryStore(Request $request)
    {
       
        $data                   = [];
        $data['name']           = $request->name;
        $data['status']         = 'Active';
       

        $category = Category::insert($data);

        if($category)
        {
            return redirect()->route('CategoryPageView')->with('message','Category added Successfully');

        }else
        {
            return redirect()->back();
        }
    }

 
    
    public function CategoryEdit($id)
    {
        $category =Category::where('id',$id)->first();
        $login=Auth::user()->id; 
        $access = Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();


        $userrole=Auth::user()->rollmanage_id;
        $roleaccess=Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();

        return view("pages.categoryPages.category-edit",compact("category",'access','roleaccess' ));
        
    }


    public function CategoryUpate(Request $request)
    {

        $data = [];
        $data['name'] = $request->category;
       
        $data['status'] = $request->status;

        $update = Category::where('id', $request->id)->limit(1)->update($data);

        if($update){
                    return redirect()->route('CategoryPageView')->with('message','Category Updated Successfully');
                    
                }else{
                    return redirect()->back();
                }
    }


    public function CategoryDelete($id){
        $result = Category::find($id)->delete();
        if($result){
            return redirect()->route('CategoryPageView')->with('message','Data deleted successfully');
        }else{
            return redirect()->back();
        }
    }
}
