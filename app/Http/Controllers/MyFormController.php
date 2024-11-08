<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;

class MyFormController extends Controller
{
    //

    public function showForm(){
        $old_records = Storage::disk('public')->get('products.json');
        if($old_records == ""){
            return view('my_form');
        }else{
            //display the data into table rows
            $data = json_decode($old_records, true);
            return view('my_form', ['data'=>$data]);
        }
        
    }

    public function saveForm(Request $request){

        $validate = $request->validate([
            'prod_name' => 'required|string|min:2|max:200',
            'qty'=>'required|numeric|max:200',
            'price'=>'required|numeric'
        ]);

        $new_product = [
                "prod_name" => $request->prod_name,
                "qty" => $request->qty,
                "price" => $request->price,
                "created" => date("l d M Y H:i:s")
        ];

        $old_records = Storage::disk('public')->get('products.json');
        if($old_records == ""){
            $dataToSave = array($new_product);
            Storage::disk('public')->put('products.json',json_encode($dataToSave));    
            return redirect()->to('/');
        }else{
            $data = json_decode($old_records, true);
            array_unshift($data,$new_product);
            $dataToSave = $data;
            Storage::disk('public')->put('products.json',json_encode($dataToSave));
            return redirect()->to('/');
        }
        
    }
    public function showEditForm($id){
        $old_records = Storage::disk('public')->get('products.json');
        $data = json_decode($old_records, true);

        return view("edit_form",['data'=>$data[$id],'id'=>$id]);
    }
    public function saveEditedForm(Request $request){
        $validate = $request->validate([
            'product_id'=>'required',
            'prod_name' => 'required|string|min:2|max:200',
            'qty'=>'required|numeric|max:200',
            'price'=>'required|numeric'
        ]);

        $old_records = Storage::disk('public')->get('products.json');
        $data = json_decode($old_records, true);
        $data[$request->product_id]['prod_name'] = $request->prod_name;
        $data[$request->product_id]['qty'] = $request->qty;
        $data[$request->product_id]['price'] = $request->price;

        Storage::disk('public')->put('products.json',json_encode($data));
        return redirect()->to("/");
    }
}
