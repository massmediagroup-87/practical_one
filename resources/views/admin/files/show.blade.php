@extends('layouts.app')

@section('content')

    <h1 class="text-center mb-4">
        File {{ $file->name }}
    </h1>
    @if ( $file->deleting_date !== null )
        <h3 class="text-center">Deleting:&nbsp;{{ $file->deleting_date }}</h3>
    @endif
    @if ( $file->comment !== null )
        <h3 class="text-center">Comment:&nbsp;{{ $file->comment }}</h3>
    @endif
    <hr>
    <div class="text-center">
        <img src="{{asset($file->path)}}" width="700" height="500">
    </div>
    <hr>
    <h3 class="text-center">Visitors:&nbsp;{{ $file->visitors }}</h3>
    <hr>
    <div class="text-center m-4">
        <a class="btn btn-primary" href="{{route('files.create')}}">
            <i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;Add another one file
        </a>
    </div>
@endsection
