<?php

namespace App\Http\Controllers;
use App\Http\Requests\FooterRequest;
use Illuminate\Http\Request;
use App\Models\FooterModel;

class FooterController extends Controller
{
    public function getFotterDataAll (){
      return view('L-itConfig.footer', ['data' => FooterModel::all()]);
    }
    public function updateFooter($id, FooterRequest $req){

        $footer  =  FooterModel::find($id);
        $footer->our_mision = $req->input('our_mision');
        $footer->phone = $req->input('phone');
        $footer->email = $req->input('email');
        $footer->address = $req->input('address');
        $footer->save();
        return redirect('footer')->with('success', $req->input('lang').' - update');

    }
}
