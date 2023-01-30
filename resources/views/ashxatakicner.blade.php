@extends('layouts.app')
@section('title')ashxatakicner @endsection
@section('contents')


<h1  style="text-align: center;">Աշխատակիցներ</h1>

<div class="container">
  <div class="row ">
    <a href="#addobyekts" class="btn btn-primary" data-toggle="collapse" >Ավելացնել Աշխատակից</a>
    <div id="addobyekts" class="collapse" style="padding:30px;">
        <form method="post" action="{{ route('addworker') }}"  enctype="multipart/form-data" style="border:3px solid grey; padding:10px; box-sizing: border-box;">
            @csrf
            <div class="team_cart_form">
                <span class="hiddenFileInput">
                    <input type="file" class="" name="image" >
                    <!-- multiple -->
                </span>
                <label for="">Անուն ազգանուն հայրանուն:</label>
                <input type="text" name="name" autofocus  placeholder="Անուն ազգանուն հայրանուն">
                <label for="">Էլ․ հասցե:</label>
                <input type="email" name="email" placeholder="Էլ․ հասցե">
                <label for="">Հեռ․:</label>
                <input type="text" name="tel"  placeholder="հեռախոսահամար">
                <label for="">Հասցե:</label>
                <input type="text" name="stret" placeholder="Հասցե"> 
                <label for="">Պոստ:</label>
                <select name="posts" id="">
                    @foreach($data_ob as $el)
                        <option value="{{$el}}">{{$el}}</option>
                    @endforeach
                </select>
                <label for="">Պատասխանատու:</label>
                <input type="text" name="hskich" placeholder="Պատասխանատու"> 
                <label for="">Նկարագրություն:</label>
                <textarea name="description" id="" cols="30" rows="10" placeholder="Նկարագրություն"></textarea>
              
            </div>
            <div class="post_button">
              <button type="submit" class="btn btn-success">Ավելացնել</button>
            </div>
        </form>
    </div>
  </div>
</div>
<div class="container">
<div class="row ">
    <a href="#obyekts" class="btn btn-primary" data-toggle="collapse" >Աշխատակիցներ</a>
    <div id="obyekts" class="collapse" style="padding:30px;">
    @foreach($data_ash as $el)
            @if(isset($el->id))
            <div style="display: flex; justify-content: space-between; margin-top: 10px;">
                <a href="{{ route('worker', [$el->id]) }}" >{{$el->name}}</a>
                <a  class="btn btn-danger" href="{{ route('obyekt_delete', [$el->id]) }}">Ջնջել</a>
            </div>

            @endif
          @endforeach
       
    </div>
</div>
@endsection