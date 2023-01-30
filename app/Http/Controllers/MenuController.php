<?php

namespace App\Http\Controllers;
use App\Http\Requests\MenuRequest;
use Illuminate\Http\Request;
use App\Models\MenuModel;
use App\Models\TeamModel;

class MenuController extends Controller
{

    public function submit($id, MenuRequest $req)
    {
        dd($req->input());
        $menu  =  MenuModel::find($id);
       // $menu = new MenuModel();
        //$menu = $req->all();
        $menu->language = $req->input('lang');
        $menu->home = $req->input('home');
        $menu->about = $req->input('about');
        $menu->team = $req->input('team');
        $menu->service = $req->input('service');
        $menu->contact = $req->input('contact');
        $menu->save();
        return redirect('menu')->with('success', $req->input('lang').' - update');
    }

    public function createMenu($id, Request $req)
    {
       // dd($req->input());
        $menu  =  MenuModel::find($id);
       // $menu = new MenuModel();
        //$menu = $req->all();
        $menu->language = $req->input('lang');
        $menu->home = $req->input('home');
        $menu->about = $req->input('about');
        $menu->team = $req->input('team');
        $menu->service = $req->input('service');
        $menu->contact = $req->input('contact');
        $menu->save();
        return redirect('menu')->with('success', $req->input('lang').' - update');
    }


    public function getMenuData()
    {
        $data = MenuModel::all();
        return response()->json($data);
    }
    public function getMenuDataAll()
    {
        return view('menu', ['data' => MenuModel::all(), 'data2' => TeamModel::all()]);
    }
}




