@extends('layouts.app')
@section('title')menu @endsection
@section('contents')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  
                @foreach($data as $el)
                    <a href="#demo{{$el->id}}" class="btn btn-primary" data-toggle="collapse">{{$el->language}}</a>
                    <div id="demo{{$el->id}}" class="collapse">
                        <form method="post" action="{{ route('menuPage',$el->id) }}" style="display: flex; flex-direction: column;">
                            @csrf
                            <input type="hidden" name="lang" value="{{$el->language}}">
                            <label for="">home</label>
                            <input type="text" name="home" autofocus  value="{{$el->home}}">
                            
                            <label for="">about</label>
                            <input type="text" name="about" value="{{$el->about}}">
                        
                            <label for="">team</label>
                            <input type="text" name="team" value="{{$el->team}}">
                            
                            <label for="">service</label>
                            <input type="text" name="service" value="{{$el->service}}">
                            
                            <label for="">contact</label>
                            <input type="text" name="contact" value="{{$el->contact}}">
                            <br>
                            <button type="submit" class="btn btn-primary">save</button>
                        </form>
                    </div>
                    <br>
                    @endforeach
                </div>
                
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script>
//   $(document).ready(function(){
//     $.ajax({

//         url:'getMenuData',
//         method:'get',
//         data:'data',
//         dataType:'json',
//         success:function (res) {
//             if (res) {
//                 $('#home').val(res[0]['home']);
//                 $('#about').val(res[0]['about']);
//                 $('#team').val(res[0]['team']);
//                 $('#service').val(res[0]['service']);
//                 $('#contact').val(res[0]['contact']);
//                 $('#home2').val(res[1]['home']);
//                 $('#about2').val(res[1]['about']);
//                 $('#team2').val(res[1]['team']);
//                 $('#service2').val(res[1]['service']);
//                 $('#contact2').val(res[1]['contact']);
//                 $('#home3').val(res[2]['home']);
//                 $('#about3').val(res[2]['about']);
//                 $('#team3').val(res[2]['team']);
//                 $('#service3').val(res[2]['service']);
//                 $('#contact3').val(res[2]['contact']);
//                 // $('#key').val(res[0]['key'])
//                 // $('#value').val(res[0]['value'])
//                 console.log(res);
//             }
            
//             //console.log(res);
            
//         }
//     })
//   });
</script>
@endsection
