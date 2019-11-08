@extends('layouts.app')

@section('content')
    <div class="text-center mb-2">
        <a href="{{route('files.create')}}" class="btn btn-primary">Add file</a>
    </div>
    <table class="table table-striped">
        <thead>
        <th><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;File name</th>
        <th class="text-left"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Comments</th>
        <th class="text-right"><i class="fa fa-tasks" aria-hidden="true"></i>&nbsp;Action</th>
        </thead>
        <tbody>
        @forelse($files as $file)
            <tr>
                <td><a href="#"><i class="fa fa-list-alt" aria-hidden="true">&nbsp;{{$file->name}}</i></a></td>
                <td class="text-left">{{$file->comment}}</td>
                <td class="text-right">
                    <form onsubmit="if(confirm('DELETE! OK?')){return true}else{return false}" action="#", method="post">

                        <input type="hidden" name="_method" value="DELETE">

                        {{ csrf_field() }}

                        <a href="#" class="btn btn-default">Edit&nbsp;<i class="fa fa-edit"></i></a>

                        <button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>

                    </form>

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
