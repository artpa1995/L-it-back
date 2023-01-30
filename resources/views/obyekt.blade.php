@extends('layouts.app')
@section('title')obyektner @endsection
@section('contents')

<div class="container">
  <div class="row ">
    <table class="table table-bordered">
        <tr>
            <th>Անվանում</th>
            <th>Հասցե</th>
            <th>Email</th>
            <th>հեռախոսահամար</th>
            <th>Պոստեր</th>
            <th>Պատասխանատու</th>
        </tr>
        <tr>
            <td>{{$data->name}}</td>
            <td>{{$data->stret}}</td>
            <td>{{$data->email}}</td>
            <td>{{$data->phone}}</td>
            <td>{{$data->posts}}</td>
            <td>{{$data->hskich}}</td>
            <!-- <td><a href="{{ route('removeMessage', [$data->id]) }}" class="btn btn-danger">Remove</a> </td> -->
        </tr>
        </table>
  </div>
</div>
<div class="container">
  <div class="row ">
    <a href="#addobyekt" class="btn btn-primary" data-toggle="collapse" >Փոփոխել</a>
    <div id="addobyekt" class="collapse" style="padding:30px;">
        <form method="post" action="{{ route('updateobyekt', [$data->id]) }}" enctype="multipart/form-data" style="border:3px solid grey; padding:10px; box-sizing: border-box;">
            @csrf
            <div class="team_cart_form">
                <label for="">Օբյեկտի անուն:</label>
                <input type="text" name="name" autofocus  placeholder="Անվանում" value="{{$data->name}}">
                <label for="">Էլ․ հասցե:</label>
                <input type="email" name="email" placeholder="Էլ․ հասցե" value="{{$data->email}}">
                <label for="">Հեռ․:</label>
                <input type="text" name="tel"  placeholder="հեռախոսահամար" value="{{$data->phone}}">
                <label for="">Հասցե:</label>
                <input type="text" name="stret" placeholder="Հասցե" value="{{$data->stret}}"> 
                <label for="">Պոստեր:</label>
                <input type="text" name="posts" placeholder="Պոստեր" value="{{$data->posts}}">  
                <label for="">Պատասխանատու:</label>
                <input type="text" name="hskich" placeholder="Պատասխանատու" value="{{$data->hskich}}">  
            </div>
            <div class="post_button">
              <button type="submit" class="btn btn-success">Փոփոխել</button>
            </div>
        </form>
    </div>
  </div>
</div>
@endsection