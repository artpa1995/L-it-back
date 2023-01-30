<?php

namespace App\Http\Controllers;

use App\Http\Requests\HeaderRequest;
use Illuminate\Http\Request;
use App\Models\Header;

class HeaderController extends Controller
{
    public function submit($id, HeaderRequest $req)
    {
       // dd($req->input());
        
       // $header = new header();
        //$header = $req->all();
        // TODO change find method to findorfail 
        $header  =  Header::find($id);
        $header->language = $req->input('lang');
        $header->home_page_title = $req->input('home_page_title');
        $header->home_page_content = $req->input('home_page_content');
        $header->about_page_title = $req->input('about_page_title');
        $header->about_page_content = $req->input('about_page_content');
        $header->service_page_title = $req->input('service_page_title');
        $header->service_page_content = $req->input('service_page_content');
        $header->contact_page_title = $req->input('contact_page_title');
        $header->contact_page_content = $req->input('contact_page_content');
        $header->team_page_title = $req->input('team_page_title');
        $header->team_page_content = $req->input('team_page_content');

        $header->save();
        return redirect('header')->with('success', $req->input('lang').' - update');
    }
    public function getHeaderDataVue(){
        return Header::all();
    }

    public function getHeaderData()
    {
        $data = Header::all();
        return response()->json($data);
    }
    public function getHeaderDataAll()
    {
        return view('L-itConfig.header', ['data' => Header::all()]);
    }
}
