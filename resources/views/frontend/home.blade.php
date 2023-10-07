@extends('layouts.Forntend.app')

@section('content')
    <div class="container">
        <div class="row mt-3">
            @foreach ($data as $row)
                <div class="col-lg-4 mt-5 mb-3">
                    <div class="card">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $row->title }}</h5>
                            <p class="card-text">{!! $row->details !!}</p>
                            <p class="card-text">Author: {!! $row->users->name !!}</p>
                            <p class="card-text">Published: {{ $row->created_at->format('d F Y H:i A') }}</p>
                            <a href="{{ route('view.blog', $row->id) }}" class="btn btn-primary">view</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">{{ $data->links() }}
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
