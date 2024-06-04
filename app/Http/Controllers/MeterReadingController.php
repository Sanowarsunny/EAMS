<?php

namespace App\Http\Controllers;

use App\Models\Assetitem;
use App\Models\Meterreading;
use App\Models\Objecttorole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeterReadingController extends Controller
{
    public function meterView()
    {
        $meters = Meterreading::with('assetitem', 'user')->orderBy('id', 'desc')->get();
        //$assets = MaintenanceAsset::get();
        $assets = Assetitem::get();

        $userrole = Auth::user()->rollmanage_id;
        $roleaccess = Objecttorole::with('user', 'manageobject')
            ->where('rollmanage_id', '=', $userrole)->get();

        return view("pages.meterPages.meter-create", compact('roleaccess', 'meters', 'assets'));
    }
    public function meterStore(Request $request)
    {
        $request->validate([
            'meter_no' => 'required',
            'description' => 'required|max:255',
        ]);

        $data = [];
        $data['assetitem_id'] = $request->assetitem_id;
        $data['meter_no'] = $request->meter_no;
        $data['description'] = $request->description;
        $data['user_id'] = Auth::user()->id;

        $meters = MeterReading::insert($data);

        if ($meters) {
            return redirect()->route('meter-view')->with('message', 'supplier added Successfully');

        } else {
            return redirect()->back();
        }
    }
    function meterList(Request $request)
    {
        $meters = MeterReading::with('assetitem', 'user')->orderBy('id', 'desc')->get();

        $userrole = Auth::user()->rollmanage_id;
        $roleaccess = Objecttorole::with('user', 'manageobject')
            ->where('rollmanage_id', '=', $userrole)->get();

        return view("pages.meterPages.meter-list", compact('roleaccess', 'meters'));

    }
    public function meterEdit($id)
    {
        $meter = Meterreading::with('assetitem')->where('id', $id)->first();

        $userrole = Auth::user()->rollmanage_id;
        $roleaccess = Objecttorole::with('user', 'manageobject')
            ->where('rollmanage_id', '=', $userrole)->get();

        return view("pages.meterPages.meter-edit", compact('roleaccess', 'meter'));

    }
    public function meterUpate(Request $request)
    {
        $request->validate([
            'meter_no' => 'required',
            'description' => 'required|max:255',
        ]);

        $data = [];
        $data['meter_no'] = $request->meter_no;
        $data['description'] = $request->description;

        $update = Meterreading::where('id', $request->id)->limit(1)->update($data);

        if ($update) {
            return redirect()->route('meter-view')->with('message', 'Meter Updated Successfully');

        } else {
            return redirect()->back();
        }
    }
    public function meterDelete($id)
    {
        $meter = Meterreading::find($id)->delete();
        if ($meter) {
            return redirect()->route('meter-view')->with('message', 'Data deleted successfully');
        } else {
            return redirect()->back();
        }
    }
}
