@extends('layouts.app')

@section('content')
    <h3 class="text-center">{{ $file->name }}</h3>
    <hr>
    <div class="text-center">
        <img src="{{asset($file->path)}}" width="900" height="700">
    </div>
    <hr>
@endsection
