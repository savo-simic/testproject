@extends('layouts.master')
@extends('partials.sidebar')
@section('title', __('Show'))
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb mt-3">
                <div class="pull-left">
                    <h2>Show Transmission</h2>
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
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $transmission->name }}
                </div>
            </div>
        </div>
    </div>
@endsection

