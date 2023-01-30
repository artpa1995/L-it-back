@extends('layouts.app')
@section('title')l-i @endsection
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
                        <a href="#demo{{$el->lang}}" class="btn btn-primary" data-toggle="collapse">{{$el->lang}}</a>
                        <div id="demo{{$el->lang}}" class="collapse">
                            <form method="post" action="{{ route('updateFooter', $el->id) }}" style="display: flex; flex-direction: column;">
                                @csrf
                                <input type="hidden" name="lang" value="{{$el->lang}}">
                                 <label for="">our mision</label>
                                <input type="text" name="our_mision" autofocus  value="{{$el->our_mision}}">
                                <label for="">phone</label>
                                <input type="text" name="phone"   value="{{$el->phone}}">
                                <label for="">email</label>
                                <input type="text" name="email"   value="{{$el->email}}">
                                <label for="">addres</label>
                                <input type="text" name="address"   value="{{$el->address}}">
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

</script>
@endsection
