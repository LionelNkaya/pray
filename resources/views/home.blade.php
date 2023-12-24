@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Dashboard Card -->
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

            <!-- Record New Prayer Button -->
            <div class="row mt-3">
                <div class="col-lg-12 text-right">
                    <a class="btn btn-success" href="{{ route('prayers.create') }}">Record New Prayer Request</a>
                </div>
            </div>

            <!-- Success Message -->
            @if ($message = Session::get('success'))
                <div class="alert alert-success mt-3">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <!-- Prayer Table -->
            <div class="table-responsive mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Prayer</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prayers as $prayer)
                        <tr>
                            <td>{{ $prayer->created_at->format('m/d/Y') }}</td>
                            <td>{{ $prayer->content }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a class="btn btn-info rounded mr-1" href="{{ route('prayers.show',$prayer->id) }}">Show</a>
                                    <a class="btn btn-primary rounded mx-1" href="{{ route('prayers.edit',$prayer->id) }}">Edit</a>
                                    <form action="{{ route('prayers.destroy', $prayer->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination Links -->
            <div class="mt-3">
                {{ $prayers->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
