<?php

namespace App\Http\Controllers;

use App\Models\PagesItemsModel;
use App\Models\PagesModel;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function Pages($page_name){
        return  PagesModel::where('page_name', $page_name)->get();
    }
    public function PageItems($id){
        return   PagesItemsModel::where('page_id', $id)->get();
    }
}
