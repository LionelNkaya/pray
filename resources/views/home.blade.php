@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="pull-left">
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('prayers.create') }}"> Record New Prayer Request</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Date</th>
        <th>Content</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($prayers as $prayer)
    <tr>
        <td>{{ $prayer->id }}</td>
        <td>{{ $prayer->created_at }}</td>
        <td>{{ $prayer->content }}</td>
        <td>
            <form action="{{ route('prayers.destroy', $prayer->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('prayers.show',$prayer->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('prayers.edit',$prayer->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>
{{ $prayers->links() }}
@endsection
