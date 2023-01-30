@extends('layouts.app')
@section('title')ashxatakic @endsection
@section('contents')

<div class="container">
  <div class="row ">
<h1>{{$data->name}}</h1>
  <img src="{{ url('public/Image/'.$data->image) }}" style="height: 200px; width: 300px;">

  <div>
    <b>Անուն</b>
    <p>{{$data->name}}</p>
  </div>
  <div>
    <b>Հասցե</b>
    <p>{{$data->stret}}</p>
  </div>
  <div>
    <b>Email</b>
    <p>{{$data->email}}</p>
  </div>
  <div>
    <b>հեռախոսահամար</b>
    <p>{{$data->phone}}</p>
  </div>
  <div>
  <b>Պոստ</b>
    <p>{{$data->posts}}</p>
  </div>
  <div>
  <b>Պատասխանատու</b>
    <p>{{$data->hskich}}</p>
  </div>


  </div>
  <div class="row">
    <h2>Նկարագրություն</h2>
    <p>{{$data->description}}</p>
  </div>
</div>
<div class="container">
  <div class="row ">
    <a href="#addobyekt" class="btn btn-primary" data-toggle="collapse" >Փոփոխել</a>
    <div id="addobyekt" class="collapse" style="padding:30px;">
        <form method="post" action="{{ route('updateworker', [$data->id]) }}" enctype="multipart/form-data" style="border:3px solid grey; padding:10px; box-sizing: border-box;">
            @csrf
            <div class="team_cart_form">
            <span class="hiddenFileInput">
                    <input type="file" class="" name="image" >
                    <!-- multiple -->
                </span>
                <label for="">Օբյեկտի անուն:</label>
                <input type="text" name="name" autofocus  placeholder="Անվանում" value="{{$data->name}}">
                <label for="">Էլ․ հասցե:</label>
                <input type="email" name="email" placeholder="Էլ․ հասցե" value="{{$data->email}}">
                <label for="">Հեռ․:</label>
                <input type="text" name="tel"  placeholder="հեռախոսահամար" value="{{$data->phone}}">
                <label for="">Հասցե:</label>
                <input type="text" name="stret" placeholder="Հասցե" value="{{$data->stret}}"> 
                <label for="">Պոստ:</label>
                <select name="posts" id="">
                    @foreach($data_ob as $el)
                        <option value="{{$el}}">{{$el}}</option>
                    @endforeach
                </select> 
                <label for="">Պատասխանատու:</label>
                <input type="text" name="hskich" placeholder="Պատասխանատու" value="{{$data->hskich}}">  
                <label for="">Նկարագրություն:</label>
                <textarea name="description" id="" cols="30" rows="10" placeholder="Նկարագրություն">{{$data->description}}</textarea>
            </div>
            <div class="post_button">
              <button type="submit" class="btn btn-success">Փոփոխել</button>
            </div>
        </form>
    </div>
  </div>
</div>
<div class="container">
    <div class="row ">
      <a href="#documents" class="btn btn-primary" data-toggle="collapse" >Փաստաթղթեր</a>
      <div id="documents" class="collapse" style="padding:30px;">
        <form method="post" action="{{ route('addDocuments', [$data->id]) }}" enctype="multipart/form-data" style="border:3px solid grey; padding:10px; box-sizing: border-box;">
            @csrf
            <div class="team_cart_form">
            <span class="hiddenFileInput">
                <input type="file" name="files[]" placeholder="Choose files" multiple >
                {{-- <input type="file" class="" name="image[]" multiple> --}}
            </span>
            <div class="post_button">
            <button type="submit" class="btn btn-success">Փոփոխել</button>
            </div>
        </form>
        <div style="margin-top:30px">
            @foreach($document as $img)
                @if(isset($img->image))
                    <a href="{{ url('public/Image/'.$img->image) }}" data-fancybox="gallery">
                        <img src="{{ url('public/Image/'.$img->image) }}" class="mugimg1" style="width: 300px; height:300px">         
                    </a>
                @endif
            @endforeach
        </div>
       
      </div>
    </div>
</div>
@endsection