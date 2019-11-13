@extends('layouts.app')

@section('content')
    <div class="text-center mb-2">
        <h3>Count links:&nbsp;{{count($links)}}</h3>
    </div>

    <table class="table table-striped">
        <thead>
        <th class="text-left"><i class="fa fa-file" aria-hidden="true"></i>&nbsp;File ID</th>
        <th class="text-left"><i class="fa fa-link" aria-hidden="true"></i>&nbsp;Link</th>
        <th class="text-left"><i class="fa fa-active" aria-hidden="true"></i>&nbsp;Active</th>
        <th class="text-right"><i class="fa fa-action" aria-hidden="true"></i>&nbsp;Action</th>
        </thead>
        <tbody>
        @forelse($links as $link)
            <tr>
                <td class="text-center">{{$link->file->id}}</td>
                <td><a href="{{ route('temp.show', $link->token) }}"><i class="fa fa-list-alt"
                                                                        aria-hidden="true">&nbsp;{{$link->token}}</i></a>
                </td>
                <td>{{$link->active}}</td>
                <td class="text-right">
                    <form onsubmit="if(confirm('DELETE! OK?')){return true}else{return false}"
                          action="{{route('temp.destroy', $link)}}" method="POST" class="destroy">
                        @csrf
                        @method('delete')
                        <button onclick="this.document.getElementsByClassName('destroy').submit(); return false;"><i
                                class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">
                    <h2 class="text-muted">Here empty yet</h2>
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
