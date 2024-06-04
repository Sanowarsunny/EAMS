<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Company;
use App\Models\Objectaccess;
use App\Models\Objecttorole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function MemberList(){
        $Member=Member::orderBy('id', 'desc')->get();
        $login=Auth::user()->id;
        $access = Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $userrole=Auth::user()->rollmanage_id;
        $roleaccess=Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();
        
        return view("pages.memberPages.member-list",compact('Member','access','roleaccess' ));
       
    }

    //Basic info start

    function MemberView(Request $request){
        $Member=Member::orderBy('id', 'desc')->get();
        $login=Auth::user()->id;
        $access = Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $userrole=Auth::user()->rollmanage_id;
        $roleaccess=Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();
        
       $companyid =Company::where('name','=',Auth::user()->company_name)->get();
       //dd($companyid);
        return view("pages.memberPages.member-create",compact("Member","access",'roleaccess','companyid'));   
    }

    public function MemberStore(Request $request)
    {
        $request->validate([
            'name'                  => 'required',
            'nid'                   => 'required',
            'contctNo'              => 'required',
        ]);

      
        $data                       = [];
        $data['name']               = $request->name;
        $data['nickname']           = $request->nickname;
        $data['fatherName']         = $request->fatherName;
        $data['motherName']         = $request->motherName;
        $data['nid']                = $request->nid;
        $data['houseNO']            = $request->houseNO;
        $data['roadNO']             = $request->roadNO;
        $data['wordNO']             = $request->wordNO;
        $data['contctNo']           = $request->contctNo;
        $data['permanentAddress']   = $request->permanentAddress;
        $data['status']             = $request->status;
        $data['date_of_birth']      = $request->date_of_birth;
        $data['joining_date']       = $request->joining_date;
        $data['department']         = $request->department;
        $data['designation']        = $request->designation;
        $data['section']            = $request->section;
        $data['citizenship']        = $request->citizenship;
        $data['grade']              = $request->grade;
        $data['job_location']       = $request->job_location;
        $data['education']          = $request->education;
        $data['experiences']        = $request->experiences;
        $data['skills']             = $request->skills;
        $data['awarded']            = $request->awarded;
        $data['holyday']            = $request->holyday;
        $data['salary']             = $request->salary;
        $data['bank_acc_no']        = $request->bank_acc_no;
        $data['bank_name']          = $request->bank_name;
        $data['reference']          = $request->reference;
        $data['currency']           = $request->currency;
        $data['user_id']            = Auth::user()->id;
        $data['company_id']         = $request->company_id;
       
  // `name`, `nickname`, `fatherName`, `motherName`, `nid`, `houseNO`, `roadNO`, `wordNO`, `contctNo`, `permanentAddress`, `status`, `date_of_birth`, `joining_date`, `ending_date`, `department`, `designation`, `section`, `citizenship`, `grade`, `job_location`, `education`, `experiences`, `skills`, `awarded`, `holyday`, `salary`, `bank_acc_no`, `bank_name`, `currency`, `reference`, `user_id`, `company_id`

        $Member = Member::insert($data);

        if($Member)
        {
            return redirect()->route('member-view')->with('message','Member added Successfully');

        }else
        {
            return redirect()->back();
        }
    }

    public function MemberEdit($id)
    {
        $Member =Member::where('id',$id)->first();
        $login=Auth::user()->id;
        $access = Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $userrole=Auth::user()->rollmanage_id;
        $roleaccess=Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();

        return view("pages.memberPages.member-edit",compact("Member","access" ,'roleaccess'));
        
    }

    public function MemberUpate(Request $request)
    {
        $request->validate([
            'name'                  => 'required',
            'nid'                   => 'required',
            'contctNo'              => 'required',
        ]);


        $data                       = [];
        $data['name']               = $request->name;
        $data['nickname']           = $request->nickname;
        $data['fatherName']         = $request->fatherName;
        $data['motherName']         = $request->motherName;
        $data['nid']                = $request->nid;
        $data['houseNO']            = $request->houseNO;
        $data['roadNO']             = $request->roadNO;
        $data['wordNO']             = $request->wordNO;
        $data['contctNo']           = $request->contctNo;
        $data['permanentAddress']   = $request->permanentAddress;
        $data['status']             = $request->status;
        $data['date_of_birth']      = $request->date_of_birth;
        $data['joining_date']       = $request->joining_date;
        $data['department']         = $request->department;
        $data['designation']        = $request->designation;
        $data['section']            = $request->section;
        $data['citizenship']        = $request->citizenship;
        $data['grade']              = $request->grade;
        $data['job_location']       = $request->job_location;
        $data['education']          = $request->education;
        $data['experiences']        = $request->experiences;
        $data['skills']             = $request->skills;
        $data['awarded']            = $request->awarded;
        $data['holyday']            = $request->holyday;
        $data['salary']             = $request->salary;
        $data['bank_acc_no']        = $request->bank_acc_no;
        $data['bank_name']          = $request->bank_name;
        $data['reference']          = $request->reference;
        $data['currency']           = $request->currency;

       

        $Member = Member::where('id', $request->id)->limit(1)->update($data);

        if($Member){
                    return redirect()->route('member-view')->with('message','Member Updated Successfully');
                    
                }else{
                    return redirect()->back();
                }
    }

    public function MemberDelete($id){
        $result = Member::find($id)->delete();
        if($result){
            return redirect()->route('member-view')->with('message','Data deleted successfully');
        }else{
            return redirect()->back();
        }
    }

// basic infor end 

function MemberViewJoining(Request $request){
    $Member=Member::orderBy('id', 'desc')->get();
    $login=Auth::user()->id;
    $access = Objectaccess::with('user','manageobject')
    ->where('user_id','=', $login)
    ->orderBy('user_id', 'asc')->get();

    $userrole=Auth::user()->rollmanage_id;
    $roleaccess=Objecttorole::with('user','manageobject')
    ->where('rollmanage_id','=', $userrole)->get();
    
    return view("pages.memberPages.member-create-joining",compact("Member","access",'roleaccess' ));   
}


function MemberViewSkills(Request $request){
    $Member=Member::orderBy('id', 'desc')->get();
    $login=Auth::user()->id;
    $access = Objectaccess::with('user','manageobject')
    ->where('user_id','=', $login)
    ->orderBy('user_id', 'asc')->get();

    $userrole=Auth::user()->rollmanage_id;
    $roleaccess=Objecttorole::with('user','manageobject')
    ->where('rollmanage_id','=', $userrole)->get();
    
    return view("pages.memberPages.member-create-skill",compact("Member","access",'roleaccess' ));   
}


}
