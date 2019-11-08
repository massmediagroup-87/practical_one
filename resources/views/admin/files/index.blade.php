@extends('layouts.app')

@section('content')

    <div class="text-center mb-2">
        <h3>Count files:&nbsp;{{count($files)}}</h3>
        <a class="btn btn-primary" href="{{route('files.create')}}">
            <i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;Add file
        </a>
    </div>

    <table class="table table-striped">
        <thead>
        <th><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;Name</th>
        <th class="text-left"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Comment</th>
        <th class="text-right"><i class="fa fa-tasks" aria-hidden="true"></i>&nbsp;Action</th>
        </thead>
        <tbody>
        @forelse($files as $file)
            <tr>
                <td><a href="{{ route('files.show', $file) }}"><i class="fa fa-list-alt" aria-hidden="true">&nbsp;{{$file->name}}</i></a></td>
                <td class="text-left">{{$file->comment}}</td>
                <td class="text-right">
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center">
                    <h2 class="text-muted">Here empty yet</h2>
                </td>
            </tr>
        @endforelse
        </tbody>
        <tfoot>
        <tr>
            <td>#</td>
            <td colspan="3">
                <ul class="pagination pull-right">
                    {{$files->links()}}
                </ul>
            </td>
        </tr>
        </tfoot>
    </table>

@endsection
