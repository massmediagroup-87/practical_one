@extends('layouts.app')

@section('content')
    <h1 class="text-center">Add file</h1>

    {!! Form::open(['route' => 'files.store', 'files' => true]) !!}

        <div class="form-group mb-4">
            {!! Form::label('customFileLangHTML', 'Add file', ['class' => 'form-control-file']); !!}
            {!! Form::file('file', ['class' => 'form-control-file', 'id' => 'customFileLangHTML']); !!}
        </div>
        <div class="form-group">
            {!! Form::label('comment', 'Comment for file'); !!}
            {!! Form::text('comment', '', ['class' => 'form-control']); !!}
        </div>
        <div class="form-group text-center">
            {!! Form::submit('Submit!', ['class' => 'btn btn-primary']); !!}
        </div>

    {!! Form::close() !!}
@endsection
