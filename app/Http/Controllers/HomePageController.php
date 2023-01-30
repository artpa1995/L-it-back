<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HomeRequest;
use App\Models\Home;

class HomePageController extends PagesItemsController
{
    // public function index()
    // {
    //     return ['data' => response()->json($this->getPage('home'))];
    // }
    public function submit(HomeRequest $req)
    {
        $home = new Home();
        $home->key = $req->input('key');
        $home->value = $req->input('value');
       
        $home->save();
        return redirect('home')/*->route('home')*/->with('success', 'Okay');
    }

    public function getHomeData()
    {
        $data = Home::all();
        return response()->json($data);
    }
    public function test (){
        $data = Home::all();
        return $data;
    }
    
    public function getall()
    {
        $page = $this->getPage('home'); 
        return view('Home', ['data' => Home::all(), 'pageIatems' => $page]);
    }

}
