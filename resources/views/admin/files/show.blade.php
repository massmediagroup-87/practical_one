@extends('layouts.app')

@section('content')

    <h1 class="text-center mb-4">
        File {{ $file->name }}
    </h1>
    @if ( $file->comment != null )
        <h3 class="text-center">Comment:&nbsp;{{ $file->comment }}</h3>
    @endif
    <hr>
    <div class="text-center">
        <img src="{{asset("storage/$file_path")}}" width="700" height="500">
    </div>
    <hr>
    <div class="text-center m-4">
        <a class="btn btn-primary" href="{{route('files.create')}}">
            <i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;Add another one file
        </a>
    </div>
@endsection
