@extends('layouts.app')
@section('title')Home @endsection
@section('contents')


<div class="container">
  <h1>Home</h1>
</div>
<div class="container">
  <div class="row ">
    <a href="#page_items" class="btn btn-primary" data-toggle="collapse">Page</a>
    <div id="page_items" class="collapse" style="padding:30px;">
    <h1>add iqons</h1>
    <form method="post" action="{{ route('addPageIqons', [1,'home']) }}" enctype="multipart/form-data">
      @csrf
      <input type="file" class="" name="image">
      <input type="hidden" name="value" value="test" placeholder="Value">  
      <label for="">Key:</label>
      <input type="text" name="key" autofocus value="" placeholder="Key">
      <div class="post_button">
        <button type="submit" class="btn btn-success">Save</button>
       </div>
    </form>
    <br>
    <div class="row">
        @foreach($pageIatems as $data)
          @if(isset($data->id) && !isset($data->lang))
          
              <a href="#page_items{{$data->id}}" class="btn btn-primary" data-toggle="collapse">{{$data->key}} - IQON</a>
              <div id="page_items{{$data->id}}" class="collapse" style="padding:10px;">
                <form method="post" action="{{ route('updatePageIqon', [$data->id,$data->page_id,'home']) }}" enctype="multipart/form-data" style="border:3px solid grey; padding:10px; box-sizing: border-box;">
                    @csrf
                    <input type="file" class="" name="image">
                    <img src="{{ url('public/Image/'.$data->value) }}" style="height: 100px; width: 150px;">
                    <label for="">Key:</label>
                    <input type="text" name="key" autofocus value="{{$data->key}}">        
                    <input type="hidden" name="value" value="{{$data->value}}">  
                    <div class="post_button">
                      <button type="submit" class="btn btn-success">Save</button>
                    </div>
                    <a href="{{ route('removePageItem', [$data->key,'home']) }}" class="btn btn-danger">Remove</a>
                </form>
              </div>
          
          @endif
        @endforeach
      </div>
    <br>
    <h1>add texts</h1>
    <form method="post" action="{{ route('setPageItem', [1,'home']) }}">
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
            @if(isset($data->id) && isset($data->lang))
             
                <a href="#page_items{{$data->id}}" class="btn btn-primary" data-toggle="collapse">{{$data->key}} - {{$data->lang}}</a>
                <div id="page_items{{$data->id}}" class="collapse" style="padding:10px;">
                  <form method="post" action="{{ route('updatePageItem', [$data->id,$data->page_id,$data->lang,'home']) }}" enctype="multipart/form-data" style="border:3px solid grey; padding:10px; box-sizing: border-box;">
                      @csrf
                      <p>{{$data->lang}}</p>
                      <label for="">Key:</label>
                      <input type="text" name="key" autofocus value="{{$data->key}}">
                      <label for="">Value:</label>
                      <input type="text" name="value" value="{{$data->value}}">  
                      <div class="post_button">
                        <button type="submit" class="btn btn-success">Save</button>
                      </div>
                      <a href="{{ route('removePageItem', [$data->key,'home']) }}" class="btn btn-danger">Remove</a>
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
            url:'homeeAjax',
            type:"post",
            datatType : 'json',
            data: {"lang" : lang, "_token": "{{ csrf_token() }}"},
           
          success: function(resonse){
            $('.home_blocks').empty()
            for (let prop in resonse) {
              if(resonse[prop].lang !== null){
                $('.home_blocks').append(
                  '<div class="col-sm-4 "><form method="post" action="'+ origin+'/homee/'+resonse[prop].worker_id+'/'+resonse[prop].lang+'/home " enctype="multipart/form-data" style="border:3px solid grey; padding:10px; box-sizing: border-box;"> @csrf<p> '+resonse[prop].lang+'</p>  <img src="'+ origin+'/public/Image/'+resonse[prop].image+' " style="height: 100px; width: 150px;"> <p>Name:'+resonse[prop].name+' '+resonse[prop].surname+'</p>  <a href="#demo'+resonse[prop].id+'" class="btn btn-primary" data-toggle="collapse">'+resonse[prop].lang+'</a><div id="demo'+resonse[prop].id+'" class="collapse"><div class="home_cart_form"><span class="hiddenFileInput"><input type="file" class="" name="image"></span>  <label for="">position:</label><input type="text" name="position" id="position" autofocus  value="'+resonse[prop].position+'">  <label for="">description:</label><input type="text" name="description" id="description"  value="'+resonse[prop].description+'"> <div class="post_button"> <button type="submit" class="btn btn-success">Save</button></div>  </div></div</form></div>'
                )
              }
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
            data: {"lang" : lang, "_token": "{{ csrf_token() }}", 'id' : 1},
           
          success: function(resonse){
            $('.page_blocks').empty()
            for (let prop in resonse) {
              if(resonse[prop].lang !== null){
              $('.page_blocks').append(
                ' <a href="#page_items'+resonse[prop].id+'/home" class="btn btn-primary" data-toggle="collapse">'+resonse[prop].key+' - '+resonse[prop].lang+'</a><div id="page_items'+resonse[prop].id+'" class="collapse" style="padding:10px;"> <form method="post" action="'+ origin+'/updatePageItem/'+resonse[prop].id+'/'+resonse[prop].page_id+'/'+resonse[prop].lang+'" enctype="multipart/form-data" style="border:3px solid grey; padding:10px; box-sizing: border-box;">@csrf <p>'+resonse[prop].lang+'</p><label for="">Key:</label><input type="text" name="key" autofocus value="'+resonse[prop].key+'"><label for="">Value:</label><input type="text" name="value" value="'+resonse[prop].value+'"><div class="post_button"> <button type="submit" class="btn btn-success">Save</button></div><a href="'+ origin+'/removePageItem/'+resonse[prop].key+'" class="btn btn-danger">Remove</a></form</div>'
                )
              }
            }
          },
       })
    })
  });
</script>
@endsection