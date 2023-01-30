<?php

namespace App\Http\Controllers;
use App\Http\Requests\TeamRequest;
use Illuminate\Http\Request;
use App\Models\TeamModel;
use App\Models\TeamDescriptionModel;
use Illuminate\Support\Facades\DB;

class TeamController extends PagesItemsController{
    
    public function addImage(){
        return view('add_image');
    }
    
    public function storeImage($id, $lang, TeamRequest $req){
       
        $data =  TeamModel::findOrFail($id);
        if($req->file('image')){
            $file = $req->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $data['image']= $filename;
            $data->save();
        }
        
        $update =  $this->editTeamDescription($id, $lang, $req);
        if($update){
            return redirect()->route('images.view')->with('success', $lang.' - update');
        }
       
        return redirect()->route('images.view');
    }
	
    public function viewImage(){


       // relation
        // $phone = TeamModel::find(1)->team_description_models;
        // dd($phone);
        
        $posts = DB::table('team_models')
            ->leftJoin('team_description_models', 'team_models.id', '=', 'team_description_models.worker_id')
            ->orderBy('team_description_models.worker_id', 'asc')
            ->get();

        $page = $this->getPage('team'); 
        return view('team', ['datas' => $posts, 'pageIatems' => $page]);
       // $imageData= TeamModel::all();
       // return view('team', compact('imageData'));
    }
    public function editTeamDescription($id, $lang, $req){

        $data = DB::table('team_description_models')->where(['worker_id'=>$id, 'lang'=>$lang])->update([
            'description' => $req->input('description'),
            'position'  => $req->input('position'),
            'updated_at' => date( "Y-m-d H:i:s",time())
        ]);
        return $data;

    }

    public function teameAjax (Request $req) {


        if($req->lang == 'ALL' && $req->ajax()){
            $posts = DB::table('team_models')
                ->leftJoin('team_description_models', 'team_models.id', '=', 'team_description_models.worker_id')
                ->orderBy('team_description_models.worker_id', 'asc')
                ->get();
                
            return  $posts;
        }
        if($req->ajax()){
            $posts = DB::table('team_models')
                ->leftJoin('team_description_models', 'team_models.id', '=', 'team_description_models.worker_id')
                ->orderBy('team_description_models.worker_id', 'asc')
                ->where('team_description_models.lang', $req->lang)
                ->get();
                
            return  $posts;
        }
    }

    public function workerCreate(Request $req){
        $data = new TeamModel();
     
        if($req->file('image')){
            $file = $req->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $data['image']= $filename;
        }
        $data->name = $req->input('name');
        $data->surname = $req->input('surname');

        $data->save();
       
        if(isset($data->id)){
            $insert =  $this->addWorkerDescription($data->id, $req);
            if($insert){
                return redirect()->route('images.view')->with('success', $req->input('name').' - Add');
            }else{
                return redirect()->route('images.view')->with('danger','Error');
            }
        }
    }
    public function addWorkerDescription($id, $req){
        
        $langs = ['AM','RU', 'EN'];
        
        foreach($langs as $lang){
            $data = new TeamDescriptionModel();
            $data->description = $req->input('description');
            $data->position = $req->input('position');
            $data->worker_id = $id;
            $data->lang = $lang; 
            $data->save();

            if(!$data->save()){
                return false;
            }
        }
        return true;
    }
    public function removeWorker($id){
        $data = TeamModel::find($id);
        if($data->delete()){
           // if(TeamDescriptionModel::where('worker_id', $id)->delete()){
                return redirect()->route('images.view')->with('success', $data->name.' - Remove');
            //}
        }
        return redirect()->route('images.view')->with('danger','Error');
    }
}
