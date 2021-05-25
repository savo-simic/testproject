@extends('layouts.master')
@extends('partials.sidebar')
@section('title', __('Edit'))
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb mt-3">
                <div class="pull-left">
                    <h2>Edit Pole</h2>
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

        <form action="{{ route('poles.update', $pole->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>Type id:</strong>
                        <input type="text" name="type_id" value="{{ $pole->type_id }}" class="form-control" placeholder="Name">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>Longitude:</strong>
                        <input type="text" class="form-control" name="lon" value="{{ $pole->lon }}"  placeholder="Longitude">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>Latitude:</strong>
                        <input type="text" class="form-control"  name="lat" value="{{ $pole->lat }}"  placeholder="Latitude"></input>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>NV:</strong>
                        <input type="text" class="form-control"  name="nv" value="{{ $pole->nv }}"  placeholder="NV"></input>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>ZSPR:</strong>
                        <input type="text" class="form-control"  name="zspr" value="{{ $pole->zspr }}"  placeholder="Zspr"></input>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>Console:</strong>
                        <input type="text" class="form-control" name="console" value="{{ $pole->console }}"  placeholder="Console"></input>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>Isolation:</strong>
                        <input type="text" class="form-control" name="isolation" value="{{ $pole->isolation }}"  placeholder="Isolation"></input>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>Grounded:</strong>
                        <input type="text" class="form-control" name="grounded" value="{{ $pole->grounded }}" placeholder="Grounded"></input>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>Disconnector:</strong>
                        <input type="text" class="form-control" name="disconnector" value="{{ $pole->disconnector }}" placeholder="Disconnector"></input>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>Rev:</strong>
                        <input type="text" class="form-control" name="rev" value="{{ $pole->rev }}" placeholder="Rev"></input>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
    </div>
@endsection

