@extends('layouts.Admin.app')


@section('content')
    @push('customCss')
        <link href="{{ asset('admin/assets/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/assets/libs/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/assets/libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
    @endpush
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
                    <form
                        action="@if (isset($row->id)) {{ route($info->form_update, $row->id) }}@else{{ route($info->form_store) }} @endif"
                        method="post">
                        @csrf
                        @if (isset($row))
                            @method('PUT')
                        @endif
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category title</label>
                            <select name="category_id" id="category_id"
                                class="form-control @error('category')
                                is-invalid
                                @enderror">
                                <option selected disabled>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @if (isset($row->category_id)) {{ $category->id === $row->category_id ? 'selected' : '' }} @endif>
                                        {{ $category->title }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" id="title"
                                class="form-control @error('title')
                                        is-invalid
                                        @enderror"
                                placeholder="Category title" name="title"
                                @if (isset($row->title)) value="{{ $row->title }}" @endif>
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Description</label>
                            <textarea
                                class="form-control @error('details')
                                is-invalid
                                @enderror"
                                name="details"> @if (isset($row->details)) {{ $row->details }} @endif
                            </textarea>
                            @error('details')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">

                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input d-none" name="status" checked
                                    value="0">
                                <input type="checkbox" class="form-check-input" name="status" value="1"
                                    @if (isset($row->status)) @if ($row->status === 1)
                                    checked @endif
                                    @endif>
                                <label class="form-check-label" for="">Status</label>
                            </div>
                        </div>
                        <button class="btn btn-primary waves-effect waves-light">Submit</button>
                    </form>
                </div>

            </div> <!-- end card body-->
        </div>
    </div>
    @push('customJs')
        <!-- Plugins js -->
        <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('details');
        </script>
    @endpush
@endsection
