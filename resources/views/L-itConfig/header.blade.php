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
                        <!-- <h2>{{$el->language}}</h2> -->
                        <a href="#demo{{$el->id}}" class="btn btn-primary" data-toggle="collapse">{{$el->language}}</a>
                        <div id="demo{{$el->id}}" class="collapse">
                            <form method="post" action="{{ route('headerPage',$el->id) }}" style="display: flex; flex-direction: column;">
                                @csrf
                                <input type="hidden" name="lang" value="{{$el->language}}">
                                <label for="">home page title</label>
                                <input type="text" name="home_page_title" autofocus  value="{{$el->home_page_title}}">
                                <label for="">home page content</label>
                                <textarea type="text" name="home_page_content" value="">{{$el->home_page_content}}</textarea>
                                <label for="">about page title</label>
                                <input type="text" name="about_page_title" value="{{$el->about_page_title}}">
                                <label for="">about page content</label>
                                <textarea type="text" name="about_page_content" value="">{{$el->about_page_content}}</textarea>
                                <label for="">service page title</label>
                                <input type="text" name="service_page_title" value="{{$el->service_page_title}}">
                                <label for="">service page content</label>
                                <textarea type="text" name="service_page_content" value="">{{$el->service_page_content}}</textarea>
                                <label for="">contact page title</label>
                                <input type="text" name="contact_page_title" value="{{$el->contact_page_title}}">
                                <label for="">contact page content</label>
                                <textarea type="text" name="contact_page_content" value="">{{$el->contact_page_content}}</textarea>
                                <label for="">team page title</label>
                                <input type="text" name="team_page_title" value="{{$el->team_page_title}}">
                                <label for="">team page content</label>
                                <textarea type="text" name="team_page_content" value="">{{$el->team_page_content}}</textarea>
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
