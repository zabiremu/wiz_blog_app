@extends('layouts.Forntend.app')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-12 px-5 py-5 mt-5 mb-3">
                <div class="card mb-3 px-5 py-5">
                    <img src="{{$data->thumbnail}}" class="d-block w-35" alt="" style="width:400px!important">
                    <div class="card-body">
                        <h5 class="card-title">{{ $data->title }}</h5>
                        <p class="card-text">{!! $data->details !!}</p>
                        <p class="card-text">Author: {{ $data->users->name}}</p>
                        <p class="card-text">Published: {{ $data->created_at->format('d F Y H:i A') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
