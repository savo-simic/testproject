@extends('layouts.master')
@extends('partials.sidebar')
@section('title', __('Login'))
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb mt-3">
                <div class="pull-left">
                    <h2>Add New Pole</h2>
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

        <form action="{{ route('poles.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>Type id:</strong>
                        <input type="text" name="type_id" class="form-control" placeholder="Name">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>Longitude:</strong>
                        <input type="text" class="form-control" name="lon" placeholder="Longitude">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>Latitude:</strong>
                        <input type="text" class="form-control"  name="lat" placeholder="Latitude"></input>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>NV:</strong>
                        <input type="text" class="form-control"  name="nv" placeholder="NV"></input>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>ZSPR:</strong>
                        <input type="text" class="form-control"  name="zspr" placeholder="Zspr"></input>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>Console:</strong>
                        <input type="text" class="form-control" name="console" placeholder="Console"></input>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>Isolation:</strong>
                        <input type="text" class="form-control" name="isolation" placeholder="Isolation"></input>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>Grounded:</strong>
                        <input type="text" class="form-control" name="grounded" placeholder="Grounded"></input>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>Disconnector:</strong>
                        <input type="text" class="form-control" name="disconnector" placeholder="Disconnector"></input>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>Rev:</strong>
                        <input type="text" class="form-control" name="rev" placeholder="Rev"></input>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
    </div>
@endsection

