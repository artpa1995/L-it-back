@extends('layouts.app')
@section('title')obyektner @endsection
@section('contents')


<h1  style="text-align: center;">Օբյեկտներ</h1>

<div class="container">
  <div class="row ">
    <a href="#addobyekts" class="btn btn-primary" data-toggle="collapse" >Ավելացնել Օբյեկտ</a>
    <div id="addobyekts" class="collapse" style="padding:30px;">
        <form method="post" action="{{ route('addObyekt') }}" enctype="multipart/form-data" style="border:3px solid grey; padding:10px; box-sizing: border-box;">
            @csrf
            <div class="team_cart_form">
                <label for="">Օբյեկտի անուն:</label>
                <input type="text" name="name" autofocus  placeholder="Անվանում">
                <label for="">Էլ․ հասցե:</label>
                <input type="email" name="email" placeholder="Էլ․ հասցե">
                <label for="">Հեռ․:</label>
                <input type="text" name="tel"  placeholder="հեռախոսահամար">
                <label for="">Հասցե:</label>
                <input type="text" name="stret" placeholder="Հասցե"> 
                <label for="">Պոստեր:</label>
                <input type="text" name="posts" placeholder="Պոստեր">  
                <label for="">Պատասխանատու:</label>
                <input type="text" name="hskich" placeholder="Պատասխանատու">  
            </div>
            <div class="post_button">
              <button type="submit" class="btn btn-success">Ավելացնել</button>
            </div>
        </form>
    </div>
  </div>

  <div class="row ">
    <a href="#obyekts" class="btn btn-primary" data-toggle="collapse" >Օբյեկտներ</a>
    <div id="obyekts" class="collapse" style="padding:30px;">
    @foreach($data as $el)
            @if(isset($el->id))
            <div style="display: flex; justify-content: space-between; margin-top: 10px;">
                <a href="{{ route('obyekt', [$el->id]) }}" >{{$el->name}}</a>
                <a  class="btn btn-danger" href="{{ route('obyekt_delete', [$el->id]) }}">Ջնջել</a>
            </div>

            @endif
          @endforeach
       
    </div>
  </div>
</div>
@endsection