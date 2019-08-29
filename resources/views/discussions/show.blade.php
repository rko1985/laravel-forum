@extends('layouts.app')

@section('content')

<div class="card">
    @include('partials.discussion-header')
    <div class="card-body">
        <div class="text-center">
            <strong>
                {{$discussion->title}}
            </strong>                    
        </div>

        <hr>

        {!! $discussion->content !!}
    </div>
</div>

<div class="card my-5">
    <div class="card-header">
        Add a reply
    </div>
    <div class="card-body">

@auth    
    <form action="{{route('replies.store', $discussion->slug)}}" method="POST">
        @csrf
        <input type="hidden" name="reply" id="reply">
        <trix-editor input="reply"></trix-editor>
        <button type="submit" class="btn btn-success btn-sm my-2">Add Reply</button>
    </form>

@else

    <a href="{{route('login')}}" class="btn btn-info">Sign in to add a reply.</a>

@endauth

    </div>
</div>

@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css" integrity="sha256-vu9SAWhYz3+PNEdy/FtYE0QBaAS2e/cB7OcSWV28WcM=" crossorigin="anonymous" />
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>
@endsection
