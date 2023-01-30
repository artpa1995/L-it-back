<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObyektnerModel;
use Auth;

class obyektner extends Controller
{
    public function getall() {
        return view('obyektner', ['data' => ObyektnerModel::all()]);
    }

    public function addObyekt (Request $req){
        $data = new ObyektnerModel();
        $data->name = $req->input('name');
        $data->phone = $req->input('tel');
        $data->email = $req->input('email');
        $data->stret = $req->input('stret');
        $data->posts = $req->input('posts');
        $data->hskich = $req->input('hskich');
        if(!$data->save()){
            return redirect('obyektner')->with('danger', $data->name.' - չավելացվեց'); 
        }
        return redirect('obyektner')->with('success', $data->name.' - ավելացվեց');
    }

    public function obyekt ($id){
        $data  =  ObyektnerModel::find($id); 
        return view('obyekt', ['data' => $data]);
    }

    public function obyekt_delete ($id){
        $data  =  ObyektnerModel::find($id); 
        if($data->delete()){
            return redirect()->route('messages')->with('success', $data->name.' - ջնջվեց');
        }
        return redirect()->route('messages')->with('danger','Error');
    }

    public function updateobyekt (Request $req, $id){
        // $user = Auth::user();
        // dd($user);
        $data  =  ObyektnerModel::find($id); 
        $data->name = $req->input('name');
        $data->phone = $req->input('tel');
        $data->email = $req->input('email');
        $data->stret = $req->input('stret');
        $data->posts = $req->input('posts');
        $data->hskich = $req->input('hskich');
        if(!$data->save()){
            return redirect('obyektner')->with('danger', $data->name.' - չփոփոխվեց'); 
        }
        return redirect('obyektner')->with('success', $data->name.' - փոփոխվեց');
    }  
    
}
