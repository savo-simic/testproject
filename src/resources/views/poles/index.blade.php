@php
    use Illuminate\Pagination\Paginator;
    Paginator::useBootstrap();
@endphp

@extends('layouts.master')
@extends('partials.sidebar')
@section('title', __('Login'))
@section('content')
    <div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Crud operations for poles</h2>
            </div>
            @if(\Illuminate\Support\Facades\Auth::user()->hasAnyRole('Administrator'))
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('poles.create') }}"> Create New Pole</a>
                </div>
            @endif
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-3">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered mt-3">
        <tr>
            <th>No</th>
            <th>Type id</th>
            <th>Lon</th>
            <th>Lat</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($poles as $pole)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $pole->type_id }}</td>
                <td>{{ $pole->lon }}</td>
                <td>{{ $pole->lat }}</td>

                <td>
                    <form action="{{ route('poles.destroy',$pole->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('poles.show',$pole->id) }}">Show</a>

                        @if(\Illuminate\Support\Facades\Auth::user()->hasAnyRole('Administrator'))
                            <a class="btn btn-primary" href="{{ route('poles.edit',$pole->id) }}">Edit</a>
                        @endif

                        @csrf
                        @method('DELETE')

                        @if(\Illuminate\Support\Facades\Auth::user()->hasAnyRole('Administrator'))
                            <button type="submit" class="btn btn-danger">Delete</button>
                        @endif
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $poles->links() !!}
    </div>
@endsection

