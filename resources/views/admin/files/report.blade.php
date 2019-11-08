@extends('layouts.app')

@section('content')
    <table class="table table-striped">
        <thead>
        <th><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;User</th>
        <th class="text-left"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Files</th>
        </thead>
        <tbody>
        @forelse($users as $user)
            <tr>
                <td><h5 class="mt-1"><i class="fa fa-list-alt" aria-hidden="true">&nbsp;{{$user->name}}</i></a></h5></td>
                <td class="text-left">{{count($user->files)}}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center">
                    <h2 class="text-muted">Here empty yet</h2>
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
