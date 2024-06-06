<?php

namespace App\Http\Controllers;

use App\Models\Assetitem_po_dtl;
use App\Models\Assetitem_po_mst;
use App\Models\Brand;
use App\Models\Categorymodel;
use App\Models\Company;
use App\Models\Currency;
use App\Models\Objectaccess;
use App\Models\Objecttorole;
use App\Models\Supplier;
use App\Models\Uom;
use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssetitemPoMstController extends Controller
{
    
    function assetPurchaseOrderView(Request $request){
       
        
        $login          =Auth::user()->id; 
        $access         =Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $userrole       =Auth::user()->rollmanage_id;
        $roleaccess     =Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();

        $purchaseOrders = Assetitem_po_mst::with(['workshop', 'supplier', 'user', 'details'])
        ->orderBy('created_at', 'desc')
        ->get();

        //data collect from table
        $currencies = Currency::orderBy('id', 'desc')->get();
        $workShopName = Workshop::orderBy('id', 'desc')->get();
        $suppilerName = Supplier::orderBy('id', 'desc')->get();
        // $companyName = Company::orderBy('id', 'desc')->get();


         $categoryName = Categorymodel::orderBy('id', 'desc')->get();
         $brandName = Brand::orderBy('id', 'desc')->get();
         $uoms = Uom::orderBy('id', 'asc')->get();

        //$assetitemPoDtls = Assetitem_po_dtl::with(['categoryModel', 'brand'])->get();

        return view("pages.AssetPurchasePages.asset-purchase-create", compact('access','roleaccess','currencies', 'suppilerName','workShopName','categoryName','brandName','uoms','purchaseOrders'));
       
        
    }


    function assetPurchaseOrderList(Request $request){
       
        $purchaseOrders = Assetitem_po_mst::with(['workshop', 'supplier', 'user', 'details'])
            ->orderBy('created_at', 'desc')
            ->get();
        
        $login          =Auth::user()->id; 
        $access         =Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $userrole       =Auth::user()->rollmanage_id;
        $roleaccess     =Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();

        return view("pages.AssetPurchasePages.asset-purchase-list",compact('purchaseOrders','access','roleaccess'));
        
        
    }
    public function assetPurchaseOrderStore(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'po_gen_id' => 'required|string|max:255',
            'currency' => 'required|exists:currencies,id',
            'approver' => 'required|string|max:255',
            //'status' => 'nullable|string|max:255',
            'LC_no' => 'nullable|string|max:255',
            'LC_date' => 'nullable|date',
            'workshop_id' => 'required|exists:workshops,id',
            'supplier_id' => 'required|exists:suppliers,id',
            //'company_id' => 'required|exists:companies,id',
            //'user_id' => 'required|exists:users,id',
            //'updated_by' => 'nullable|string|max:255',
            'categorymodel_id.*' => 'required|exists:categorymodels,id',
            'unit_price.*' => 'required|numeric',
            'quantity.*' => 'required|numeric',
            'total_amount.*' => 'nullable|numeric',
            'uom_id.*' => 'required|exists:uoms,id',
        ]);

        //  user_id with the authenticated user's ID
        $validatedData['user_id'] = Auth::id();
        $validatedData['company_id'] = Auth::user()->company_id;
        $validatedData['status'] = 'pending';
        $validatedData['updated_by'] = Auth::user()->name;


        // Create a new Assetitem_po_mst
        $assetPurchaseOrder_mst = Assetitem_po_mst::create($validatedData);

        if ($assetPurchaseOrder_mst) {
            // Extract detail data from request
            $detailData = [];
            foreach ($request->input('categorymodel_id') as $key => $value) {
                $detailData[] = [
                    'assetitem_po_mst_id' => $assetPurchaseOrder_mst->id,
                    'categorymodel_id' => $request->input('categorymodel_id')[$key],
                    'brand_id' => $request->input('brand_id')[$key],
                    'unit_price' => $request->input('unit_price')[$key],
                    'quantity' => $request->input('quantity')[$key],
                    'total_amount' => $request->input('total_amount')[$key],
                    'uom_id' => $request->input('uom_id')[$key],
                    'user_id' => Auth::id(),
                    'updated_by' => Auth::user()->name,
                ];
            }

            // Create detail records
            Assetitem_po_dtl::insert($detailData);

            return redirect()->route('assetPurchaseOrder-view')->with('message', 'Asset Purchase Order added Successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to add Asset Purchase Order');
        }
    }

    public function assetPurchaseOrderEdit($id)
    {

        $login          =Auth::user()->id; 
        $access         =Objectaccess::with('user','manageobject')
        ->where('user_id','=', $login)
        ->orderBy('user_id', 'asc')->get();

        $userrole       =Auth::user()->rollmanage_id;
        $roleaccess     =Objecttorole::with('user','manageobject')
        ->where('rollmanage_id','=', $userrole)->get();


        $purchaseOrder = Assetitem_po_mst::findOrFail($id);
        $currencies = Currency::orderBy('id', 'desc')->get();
        $workShopName = Workshop::orderBy('id', 'desc')->get();
        $suppilerName = Supplier::orderBy('id', 'desc')->get();
        $categoryName = Categorymodel::orderBy('id', 'desc')->get();
        $brandName = Brand::orderBy('id', 'desc')->get();
        $uoms = Uom::orderBy('id', 'asc')->get();

        return view("pages.AssetPurchasePages.asset-purchase-edit", compact('access','roleaccess','purchaseOrder', 'currencies', 'workShopName', 'suppilerName', 'categoryName', 'brandName', 'uoms'));
    }

    public function assetPurchaseOrderUpdate(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'po_gen_id' => 'required|string|max:255',
            'currency' => 'required|exists:currencies,id',
            'approver' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'LC_no' => 'nullable|string|max:255',
            'LC_date' => 'nullable|date',
            'workshop_id' => 'required|exists:workshops,id',
            'supplier_id' => 'required|exists:suppliers,id',
            //'company_id' => 'required|exists:companies,id',
            //'user_id' => 'required|exists:users,id',
            //'updated_by' => 'nullable|string|max:255',
            'categorymodel_id.*' => 'required|exists:categorymodels,id',
            'unit_price.*' => 'required|numeric',
            'quantity.*' => 'required|numeric',
            'total_amount.*' => 'nullable|numeric',
            'uom_id.*' => 'required|exists:uoms,id',
        ]);

        // Get the Assetitem_po_mst record to update
        $assetPurchaseOrder_mst = Assetitem_po_mst::findOrFail($id);

        // Update the Assetitem_po_mst record with validated data
        $assetPurchaseOrder_mst->update($validatedData);

        if ($assetPurchaseOrder_mst) {
            // Delete existing detail records
            $assetPurchaseOrder_mst->details()->delete();

            // Extract detail data from request and create new detail records
            $detailData = [];
            foreach ($request->input('categorymodel_id') as $key => $value) {
                $detailData[] = [
                    'assetitem_po_mst_id' => $assetPurchaseOrder_mst->id,
                    'categorymodel_id' => $request->input('categorymodel_id')[$key],
                    'brand_id' => $request->input('brand_id')[$key],
                    'unit_price' => $request->input('unit_price')[$key],
                    'quantity' => $request->input('quantity')[$key],
                    'total_amount' => $request->input('total_amount')[$key],
                    'uom_id' => $request->input('uom_id')[$key],
                    'user_id' => Auth::id(),
                    'updated_by' => Auth::user()->name,
                ];
            }

            // Create new detail records
            Assetitem_po_dtl::insert($detailData);

            return redirect()->route('assetPurchaseOrder-list')->with('message', 'Asset Purchase Order updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update Asset Purchase Order');
        }
    }

    public function assetPurchaseOrderDestroy($id)
    {
        // Find the purchase order by ID
        $purchaseOrder = Assetitem_po_mst::findOrFail($id);

        // Delete the purchase order
        $purchaseOrder->delete();

        // Redirect back to the previous page
        return redirect()->back()->with('message', 'Asset Purchase Order deleted successfully.');
    }
}
