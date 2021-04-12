<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\ClientRawProduct;
use App\Collection;
use App\Finishedgood;
use App\Http\Controllers\Controller;
use App\Sell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::orderBy('id', 'DESC')->paginate(20);
        return view('client.index', compact('clients'));
    }
    public function create()
    {
        return view('client.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'unique:clients',
        ]);
        $document = $request->file('photo');
        if(!empty($document)){
            $document_name = rand().'.'.$document->getClientOriginalExtension();
            $document->move(public_path().'/assets/images/client/',$document_name);
        }
        else{
            $document_name = $request->photo;
        }
            Client::create([
                'name'=>$request->name,
                'c_person'=>$request->c_person,
                'photo'=>$document_name,
                'address'=>$request->address,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'due'=>0,
                'payment'=>0,
                'balance'=>0,
            ]);
            Session::flash('success', 'Client created Successfully');
            return redirect()->route('client.index');


    }

    public function show($id)
    {
        $client = Client::find($id);
        $collections = Collection::where('client_id', $id)->paginate(5);
        $sells = Sell::where('client_id', $id)->paginate(5);
        $sales_lists = Sell::where('client_id', $id)->orderBy('id', 'DESC')->get(['type_of_rice','quantity','quantity_kg']);
        foreach ($sales_lists as $sales_list){
            $product_name = explode(',',str_replace(str_split('[]""'),'',$sales_list['type_of_rice']));
            $quantity = explode(',',str_replace(str_split('[]""'),'',$sales_list['quantity']));
            $quantity_kg = explode(',',str_replace(str_split('[]""'),'',$sales_list['quantity_kg']));

            for($i = 0 ; $i < count($product_name) ; $i++){
                if($quantity_kg[$i] == 'null'){
                    $quantity_kg[$i] = 0;
                }
                $p = Finishedgood::find($product_name[$i])->name;
                $check = ClientRawProduct::where('product_name',$p)->first();
                if(empty($check)){
                    ClientRawProduct::create([
                        'product_name' => $p,
                        'quantity' => $quantity[$i],
                        'quantity_kg' => $quantity_kg[$i],
                    ]);
                }else{
                    $q = $check->quantity + $quantity[$i];
                    $q_kg = $check->quantity_kg + $quantity_kg[$i];
                    $check->update([
                        'quantity' => $q,
                        'quantity_kg' => $q_kg,
                    ]);
                }
            }
        }
        $rows = ClientRawProduct::orderBy('id','Desc')->paginate(5);
        ClientRawProduct::truncate();
        return view('client.show', compact('client', 'collections', 'sells', 'rows'));
    }

    public function edit($id)
    {
        $client = Client::find($id);
        return view('client.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'unique:clients,email,'.$id,
        ]);
        $client = Client::find($id);
        $d = Client::find($id);

        if(!empty($request->file('photo'))){
            if(!empty($d->photo)){
                unlink('assets/images/client/'.$d->photo);
            }
            $document = $request->file('photo');
            $document_name = rand().'.'.$document->getClientOriginalExtension();
            $document->move(public_path().'/assets/images/client/',$document_name);
            $client->update([
                'name'=>$request->name,
                'c_person'=>$request->c_person,
                'photo'=>$document_name,
                'address'=>$request->address,
                'phone'=>$request->phone,
                'email'=>$request->email,
            ]);
        }
        else{
            $client->update([
                'name'=>$request->name,
                'c_person'=>$request->c_person,
                'address'=>$request->address,
                'phone'=>$request->phone,
                'email'=>$request->email,
            ]);
        }
        Session::flash('success', 'Client profile Updated Successfully');
        return redirect()->route('client.index');
    }

    public function destroy($id)
    {
        $client = Client::find($id);
        if(!empty($client->photo)){
            unlink('assets/images/client/'.$client->photo);
        }
        $client->delete();
        Session::flash('success', 'Client Deleted Successfully');
        return redirect()->route('client.index');
    }
    public function search(Request $request){
        $input = $request->item;
        $clients = Client::where('name', 'like', "%$input%")
            ->orWhere('email', 'like', "%$input%")
            ->orWhere('phone', 'like', "%$input%")
            ->orWhere('address', 'like', "%$input%")
            ->orderBy('id', 'DESC')->paginate(20);
        return view('client.index', compact('clients'));

    }
}
