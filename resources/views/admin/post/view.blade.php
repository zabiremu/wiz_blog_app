@extends('layouts.Admin.app')


@section('content')
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">
                            {{ $info->page_title }}</a></li>
                </ol>
            </div>
            <h4 class="page-title">
                @if (isset($row->title))
                    {{ $row->title }}
                @else
                    {{ $info->page_title }}
                @endif
            </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <div class="col-lg-4">
                            <span>Category:</span>
                        </div>

                        <div class="col-lg-8">
                            <span>{!! $row->categories->title !!}</span>
                        </div>

                        <div class="col-lg-4">
                            <span>Title:</span>
                        </div>

                        <div class="col-lg-8">
                            <span> {{ $row->title }}</span>
                        </div>

                        <div class="col-lg-4">
                            <span>Details:</span>
                        </div>

                        <div class="col-lg-8">
                            <span>{!! $row->details !!}</span>
                        </div>

                        <div class="col-lg-4">
                            <span>Author:</span>
                        </div>
                        <div class="col-lg-8">
                            <span> {{ $row->users->name }}</span>
                        </div>

                        <div class="col-lg-4">
                            <span>Date:</span>
                        </div>
                        <div class="col-lg-8">
                            <span>{{ $row->created_at->format('d F Y H:i A') }}</span>
                        </div>

                        <div class="col-lg-4">
                            <span>Status</span>
                        </div>
                        <div class="col-lg-8">
                            @if ($row->status === 1)
                                <span class="badge bg-success rounded-pill">Active</span>
                            @else
                                <span class="badge bg-danger rounded-pill">in-active</span>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
