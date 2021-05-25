@extends('layouts.master')
@extends('partials.sidebar')
@section('title', __('Show'))
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb mt-3">
                <div class="pull-left">
                    <h2>Show Pole</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('poles.index') }}"> Back</a>
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
                    <strong>Type id:</strong>
                    {{ $pole->type_id }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                <div class="form-group">
                    <strong>Longitude:</strong>
                    {{ $pole->lon }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                <div class="form-group">
                    <strong>Latitude:</strong>
                    {{ $pole->lat }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                <div class="form-group">
                    <strong>NV:</strong>
                    {{ $pole->nv }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                <div class="form-group">
                    <strong>ZSPR:</strong>
                    {{ $pole->zspr }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                <div class="form-group">
                    <strong>Console:</strong>
                    {{ $pole->console }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                <div class="form-group">
                    <strong>Isolation:</strong>
                    {{ $pole->isolation }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                <div class="form-group">
                    <strong>Grounded:</strong>
                    {{ $pole->grounded }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                <div class="form-group">
                    <strong>Disconnector:</strong>
                    {{ $pole->disconnector }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                <div class="form-group">
                    <strong>Rev:</strong>
                    {{ $pole->rev }}
                </div>
            </div>
        </div>
    </div>
@endsection

