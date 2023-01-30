<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\PageItemsRequest;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use App\Models\PagesItemsModel;
use App\Models\PagesModel;
use Illuminate\Support\Facades\Auth;
class PagesItemsController extends PagesController
{
    //$user_id = Auth::user()->id;
    public function getPage($currentURL){
        $page = $this->Pages($currentURL);
        $data = $this->PageItems($page[0]->id);
        return $data;
    }

    public function setPageItem($id,$page, PageItemsRequest $req){
        $langs = ['AM','RU', 'EN'];

        foreach($langs as $lang){
            $data = new PagesItemsModel();
            $data->key = $req->input('key');
            $data->value = $req->input('value');
            $data->page_id = $id;
            $data->lang = $lang; 
            $data->save();
            if(!$data->save()){
                return redirect($page)->with('danger', $req->input('key').' - NOT SET');
            }
        }
        return redirect($page)->with('success', $req->input('key').' - SET');
       
    }
    public function addPageIqons ($id,$page, Request $req){
       
       
        $data = new PagesItemsModel();
       
        if($req->file('image')){
            $file = $req->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $data['value'] = $filename;
            $data->page_id = $id;
            $data->key = $req->input('key');
            if(!$data->save()){
                return redirect($page)->with('danger', $req->input('key').' - NOT SET');
            }
        }
        return redirect($page)->with('success', $req->input('key').' - SET');
    }

    public function updatePageIiqon($id,$page_id,$page, Request $req){
        $data = PagesItemsModel::findOrFail($id);

        if($req->file('image')){
            $file = $req->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $data['value']= $filename; 
        }
        $data->page_id = $page_id;
        $data->key = $req->input('key');
        if(!$data->save()){
            return redirect($page)->with('danger', $req->input('key').' - NOT Update');
        }
        return redirect($page)->with('success', $req->input('key').' - Update');
    }

    public function updatePageItem($id,$page_id,$lang,$page ,  PageItemsRequest $req){
        
        $data = PagesItemsModel::findOrFail($id);
        $data->key = $req->input('key');
        $data->value = $req->input('value');
        $data->page_id = $page_id;
        $data->lang = $lang; 
        $data->save();
        return redirect($page)->with('success', $data->key.' - update'); 
        
    }

    public function removePageItem($key, $page){
        if(PagesItemsModel::where('key', $key)->delete()){
            return redirect($page)->with('success', $key.' - Remove');
        }
    }

    public function getPageAjax (Request $req) {
        if($req->lang == 'ALL' && $req->ajax()){
            $data = PagesItemsModel::where(['page_id' => $req->id])->get();          
            return  $data;
        }
        if($req->ajax()){
            $data = PagesItemsModel::where(['page_id' => $req->id,'lang'=>$req->lang ])->get();          
            return  $data;
        }
    }

    
}
