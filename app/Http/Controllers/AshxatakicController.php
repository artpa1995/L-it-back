<?php

namespace App\Http\Controllers;
use App\Models\ObyektnerModel;
use App\Models\AshxatakicModel;
use App\Models\documents;

use Illuminate\Http\Request;

class AshxatakicController extends Controller
{
    //
    public function getall (){
        return view('ashxatakicner', ['data_ob' => ObyektnerModel::all()->pluck('name'), 'data_ash' => AshxatakicModel::all()]);
    }

    public function addworker (Request $req){
        $data = new AshxatakicModel();
       // dd($req);
        if($req->file('image')){
            $file = $req->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $data['image']= $filename;
        }
        $data->name = $req->input('name');
        $data->phone = $req->input('tel');
        $data->email = $req->input('email');
        $data->stret = $req->input('stret');
        $data->posts = $req->input('posts');
        $data->hskich = $req->input('hskich');
        $data->description = $req->input('description');
        if(!$data->save()){
            return redirect('ashxatakicner')->with('danger', $data->name.' - չավելացվեց'); 
        }
        return redirect('ashxatakicner')->with('success', $data->name.' - ավելացվեց');
    }

    public function worker ($id){
        $data  =  AshxatakicModel::find($id); 
        $document = documents::where('worker_id', $id)->get();
        
        return view('worker', ['data_ob' => ObyektnerModel::all()->pluck('name'), 'data' => $data, 'document' => $document]);
    }

    public function updateworker (Request $req, $id){
        // $user = Auth::user();
        // dd($user);
        $data  =  AshxatakicModel::find($id); 

        if($req->file('image')){
            $file = $req->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $data['image']= $filename;
        }
        $data->name = $req->input('name');
        $data->phone = $req->input('tel');
        $data->email = $req->input('email');
        $data->stret = $req->input('stret');
        $data->posts = $req->input('posts');
        $data->hskich = $req->input('hskich');
        $data->description = $req->input('description');
        if(!$data->save()){
            return redirect('ashxatakicner')->with('danger', $data->name.' - չփոփոխվեց'); 
        }
        return redirect('ashxatakicner')->with('success', $data->name.' - փոփոխվեց');
    }
    
    public function worker_delete ($id){
        $data  =  AshxatakicModel::find($id); 
        if($data->delete()){
            return redirect()->route('messages')->with('success', $data->name.' - ջնջվեց');
        }
        return redirect()->route('messages')->with('danger','Error');
    }

    public function addDocuments (Request $request, $id){
        if($request->hasfile('files'))
         {
            foreach($request->file('files') as $key => $file)
            {
                $path = $file->store('public/files');
                $name = $file->getClientOriginalName();
                $insert[$key]['image'] = $name;
                $insert[$key]['worker_id'] = $id;
            }
         }
         documents::insert($insert);
         return redirect('ashxatakicner')->with('success','ավելացվեց');

    }
}
