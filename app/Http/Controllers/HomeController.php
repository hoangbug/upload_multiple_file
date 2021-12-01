<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\DataCustomer;
use App\Models\DataJson;

class HomeController extends Controller
{
    public function index(){
        return view('pages.home');
    }

    public function viewCustomer(){
        if(request()->ajax()) {
            $data = DataCustomer::select('id', 'name_customer', 'gender', 'identity_card', 'address', 'phone')->get()->toArray();
            return Datatables::of($data)->make(true);
        }
        return view('pages.data-customer');
    }

    public function viewAddData(){
        return view('pages.add-data');
    }

    public function addData(Request $request){
        if(request()->ajax()) {
            $request->validate([
                'text' => 'required'
            ]);
            $text = json_decode($request->text);
            if(!empty($text)){
                for ($i = 0; $i < count($text); $i++) {
                    $checkEmptyData = DataCustomer::select('id')->where('customer_code', $text[$i]->CustomerID)->get()->toArray();
                    if(empty($checkEmptyData)){
                        $dataCustomer = new DataCustomer;
                        $dataCustomer->customer_code = $text[$i]->CustomerID;
                        $dataCustomer->name_customer = $text[$i]->Name;
                        if(!empty($text[$i]->Gender)){
                            $dataCustomer->gender = $text[$i]->Gender;
                        }
                        $dataCustomer->identity_card = $text[$i]->CMND;
                        $dataCustomer->address = $text[$i]->Address;
                        $dataCustomer->phone = $text[$i]->Phone;
                        $dataCustomer->save();
                    }
                }
                $dataJson = new DataJson;
                $dataJson->json_data = $request->text;
                $dataJson->save();
            }
        }
    }

    public function viewTestImage(){
        return view('pages.test-image');
    }

    public function viewTestMultipleImage(){
        return view('pages.multiple-image');
    }

    public function viewTestMultipleImageBase(){
        return view('pages.multiple-imagebase');
    }

    public function getImage(Request $request){
        var_dump($request->all());
    }

}
