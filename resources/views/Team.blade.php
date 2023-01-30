@extends('layouts.app')
@section('title')Team @endsection
@section('contents')


<div class="container">
  <h1>Team</h1>
  
  <div class="row ">
    <a href="#demo" class="btn btn-primary" data-toggle="collapse">Worker</a>
    <div id="demo" class="collapse">
    <form method="post" action="{{ route('workerCreate') }}" enctype="multipart/form-data" style="border:3px solid grey; padding:10px; box-sizing: border-box;">
        @csrf
        <div class="team_cart_form">
            <span class="hiddenFileInput">
              <input type="file" class="" name="image">
            </span>
            <label for="">Name:</label>
            <input type="text" name="name" autofocus  placeholder="Name">
            <label for="">surname:</label>
            <input type="text" name="surname" placeholder="Surname">
            <label for="">Position:</label>
            <input type="text" name="position"  placeholder="Position">
            <label for="">Description:</label>
            <input type="text" name="description" placeholder="Description">  
        </div>
        <div class="post_button">
          <button type="submit" class="btn btn-success">Add</button>
        </div>
      </form>

        <select name="" id="lang1" class="team_lang_sort">
          <option value="ALL">ALL</option>
          <option value="AM">AM</option>
          <option value="RU">RU</option>
          <option value="EN">EN</option>
        </select>
      <div class="row team_blocks">
          @foreach($datas as $data)
            @if(isset($data->worker_id))
              <div class="col-sm-4 ">
                <form method="post" action="{{ route('teame', [$data->worker_id,$data->lang,'team']) }}" enctype="multipart/form-data" style="border:3px solid grey; padding:10px; box-sizing: border-box;">
                @csrf
                <p> {{$data->lang}}</p>
                <img src="{{ url('public/Image/'.$data->image) }}" style="height: 100px; width: 150px;">
                <p>Name: {{$data->name}} {{$data->surname}}</p>
                <a href="#demo{{$data->id}}" class="btn btn-primary" data-toggle="collapse">{{$data->lang}}</a>
                <div id="demo{{$data->id}}" class="collapse">
                  <div class="team_cart_form">
                      <span class="hiddenFileInput">
                        <input type="file" class="" name="image">
                      </span>
                      <label for="">position:</label>
                      <input type="text" name="position" id="position" autofocus  value="{{$data->position}}">
                      <label for="">description:</label>
                      <input type="text" name="description" id="description"  value="{{$data->description}}">  
                  </div>
                  <div class="post_button">
                    <button type="submit" class="btn btn-success">Save</button>
                  </div>
                  <a href="{{ route('removeWorker', [$data->worker_id,'team']) }}" class="btn btn-danger">Remove</a>  
                </div>
                </form>
              </div>
            @endif
          @endforeach
        </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row ">
    <a href="#page_items" class="btn btn-primary" data-toggle="collapse">Page</a>
    <div id="page_items" class="collapse" style="padding:30px;">
    <form method="post" action="{{ route('setPageItem', [5,'team']) }}">
      @csrf
      <label for="">Key:</label>
      <input type="text" name="key" autofocus value="" placeholder="Key">
      <label for="">Value:</label>
      <input type="text" name="value" value="" placeholder="Value">  
      <div class="post_button">
        <button type="submit" class="btn btn-success">Save</button>
       </div>
    </form>
    <select name="" id="lang2" class="team_lang_sort">
          <option value="ALL">ALL</option>
          <option value="AM">AM</option>
          <option value="RU">RU</option>
          <option value="EN">EN</option>
        </select>
        <div class="row page_blocks">
          @foreach($pageIatems as $data)
            @if(isset($data->id))
             
                <a href="#page_items{{$data->id}}" class="btn btn-primary" data-toggle="collapse">{{$data->key}} - {{$data->lang}}</a>
                <div id="page_items{{$data->id}}" class="collapse" style="padding:10px;">
                  <form method="post" action="{{ route('updatePageItem', [$data->id,$data->page_id,$data->lang,'team']) }}" enctype="multipart/form-data" style="border:3px solid grey; padding:10px; box-sizing: border-box;">
                      @csrf
                      <p>{{$data->lang}}</p>
                      <label for="">Key:</label>
                      <input type="text" name="key" autofocus value="{{$data->key}}">
                      <label for="">Value:</label>
                      <input type="text" name="value" value="{{$data->value}}">  
                      <div class="post_button">
                        <button type="submit" class="btn btn-success">Save</button>
                      </div>
                      <a href="{{ route('removePageItem', [$data->key,'team']) }}" class="btn btn-danger">Remove</a>
                  </form>
                </div>
             
            @endif
          @endforeach
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){

    $('#lang1').on('change',function(){
      var origin = window.location.origin; 
      let lang = $(this).val();
      $.ajax({
            url:'teameAjax',
            type:"post",
            datatType : 'json',
            data: {"lang" : lang, "_token": "{{ csrf_token() }}"},
           
          success: function(resonse){
            $('.team_blocks').empty()
            for (let prop in resonse) {
              $('.team_blocks').append(
                '<div class="col-sm-4 "><form method="post" action="'+ origin+'/teame/'+resonse[prop].worker_id+'/'+resonse[prop].lang+'/team " enctype="multipart/form-data" style="border:3px solid grey; padding:10px; box-sizing: border-box;"> @csrf<p> '+resonse[prop].lang+'</p>  <img src="'+ origin+'/public/Image/'+resonse[prop].image+' " style="height: 100px; width: 150px;"> <p>Name:'+resonse[prop].name+' '+resonse[prop].surname+'</p>  <a href="#demo'+resonse[prop].id+'" class="btn btn-primary" data-toggle="collapse">'+resonse[prop].lang+'</a><div id="demo'+resonse[prop].id+'" class="collapse"><div class="team_cart_form"><span class="hiddenFileInput"><input type="file" class="" name="image"></span>  <label for="">position:</label><input type="text" name="position" id="position" autofocus  value="'+resonse[prop].position+'">  <label for="">description:</label><input type="text" name="description" id="description"  value="'+resonse[prop].description+'"> <div class="post_button"> <button type="submit" class="btn btn-success">Save</button></div>  </div></div</form></div>'
              )
            }
          },
       })
    })
    $('#lang2').on('change',function(){
      let origin = window.location.origin; 
      let lang = $(this).val();
      $.ajax({
            url:'getPageAjax',
            type:"post",
            datatType : 'json',
            data: {"lang" : lang, "_token": "{{ csrf_token() }}", 'id' : 5},
           
          success: function(resonse){
            $('.page_blocks').empty()
            for (let prop in resonse) {
              $('.page_blocks').append(
                ' <a href="#page_items'+resonse[prop].id+'/team" class="btn btn-primary" data-toggle="collapse">'+resonse[prop].key+' - '+resonse[prop].lang+'</a><div id="page_items'+resonse[prop].id+'" class="collapse" style="padding:10px;"> <form method="post" action="'+ origin+'/updatePageItem/'+resonse[prop].id+'/'+resonse[prop].page_id+'/'+resonse[prop].lang+'" enctype="multipart/form-data" style="border:3px solid grey; padding:10px; box-sizing: border-box;">@csrf <p>'+resonse[prop].lang+'</p><label for="">Key:</label><input type="text" name="key" autofocus value="'+resonse[prop].key+'"><label for="">Value:</label><input type="text" name="value" value="'+resonse[prop].value+'"><div class="post_button"> <button type="submit" class="btn btn-success">Save</button></div><a href="'+ origin+'/removePageItem/'+resonse[prop].key+'" class="btn btn-danger">Remove</a></form</div>'
                 )
            }
          },
       })
    })
  });
</script>
@endsection