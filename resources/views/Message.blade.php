@extends('layouts.app')
@section('title')messages @endsection
@section('contents')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>PHONE</th>
                            <th>TIME</th>
                        </tr>
                        <tr>
                            <td>{{$el->id}}</td>
                            <td>{{$el->name}}</td>
                            <td>{{$el->email}}</td>
                            <td>{{$el->phone}}</td>
                            <td>{{$el->created_at}}</td>
                            <td><a href="{{ route('removeMessage', [$el->id]) }}" class="btn btn-danger">Remove</a> </td>
                        </tr>
                    </table>
                    <div >
                    {{$el->message}}
                    </div>
                </div>    
            </div>
        </div>
    </div>
</div>


<script>

</script>
@endsection
