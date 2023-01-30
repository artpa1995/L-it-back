@extends('layouts.app')
@section('title')messages @endsection
@section('contents')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
                
                    <table class="table table-bordered">
                        <th>ID</th>
                        <th>STATUS</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>PHONE</th>
                        <th>MESSAGE</th>
                        <th>TIME</th>
                    
                        @foreach($data as $el)
                        @php
                            $words = explode(" ", $el->message);
                            $first = join(" ", array_slice($words, 0, 3));
                            $rest = join(" ", array_slice($words, 5));
                            $status = '';
                            $status = "NEW";
                            if($el->status != 0){
                                $status = "Paraviewed";
                            }

                        @endphp
                   
                        <tr>
                            <td>{{$el->id}}</td>
                            <td style="text-align: center;">{{$status}}</td>
                            <td>{{$el->name}}</td>
                            <td>{{$el->email}}</td>
                            <td>{{$el->phone}}</td>
                            <td> <a href="{{ route('message', [$el->id]) }}">{{$first}} </a></td>
                            <td>{{$el->created_at}}</td>
                            <td><a href="{{ route('removeMessage', [$el->id]) }}" class="btn btn-danger">Remove</a> </td>
                        </tr>
                    @endforeach
                    </table>

        </div>
    </div>
</div>


<script>

</script>
@endsection
