@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Record New Prayer</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group">
                        <label>Date:</label>
                        <p>{{ date('Y-m-d') }}</p>
                    </div>

                    <form action="{{ route('prayers.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="content">Content:</label>
                            <textarea class="form-control mt-2" id="content" name="content" rows="5" placeholder="Enter content"></textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="mt-3">
                <a class="btn btn-secondary" href="{{ route('home') }}">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
