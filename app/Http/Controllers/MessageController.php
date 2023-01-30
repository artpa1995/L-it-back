<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MessageModel;

class MessageController extends Controller{

    public function sendMessage( Request $req){
        $data = new MessageModel();
        $data->name = $req->name;
        $data->status = 0;
        $data->phone = $req->phone;
        $data->message = $req->message;
        $data->email = $req->email; 
        
        if( $data->save()){
            return true;
        }
        return false;
    }

    public function getAllMessage (){
        $data = new MessageModel;
        return view('messages', ['data' => $data->orderBy('id', 'desc')->get()]);
    }

    public function message ($id){
        $data  =  MessageModel::find($id);
        $data->status = 1;
        $data->save(); 
        return view('message', ['el' => $data]);
    }

    public function removeMessage($id){
        $data = MessageModel::find($id);
        if($data->delete()){
            return redirect()->route('messages')->with('success', $data->name.' - Remove');
        }
        return redirect()->route('messages')->with('danger','Error');
    }
    public function newmessage(){

         $messages = MessageModel::where('status', '=', 0)->get();
         $count = 0;
         foreach($messages as $message){
            $count ++;  
         }
         return $count;
        
    } 
    
}
