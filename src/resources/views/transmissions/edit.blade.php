@extends('layouts.master')
@extends('partials.sidebar')
@section('title', __('Edit'))
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb mt-3">
                <div class="pull-left">
                    <h2>Edit Transmission</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('transmissions.index') }}"> Back</a>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('transmissions.update', $transmission->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" value="{{ $transmission->name }}" class="form-control" placeholder="Name">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
    </div>
@endsection

