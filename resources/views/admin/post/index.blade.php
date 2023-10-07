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
                {{ $info->page_title }}
            </h4>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="w-25 ms-auto text-end">
                        <a href="{{route($info->form_create)}}" class="btn btn-primary waves-effect waves-light">Create</a>
                    </div>
                    <div class="table-responsive mb-3">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Title</th>
                                    <th>Descritpion</th>
                                    <th>Author</th>
                                    <th>Published Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $key => $row)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ Str::limit($row->categories->title, 20, '....') }}</td>
                                        <td>{{ Str::limit($row->title, 20, '....') }}</td>
                                        <td>{!! Str::limit($row->details, 30, '....') !!}</td>
                                        <td>{{ Str::limit($row->users->name, 30, '....') }}</td>
                                        <td>{{ $row->created_at->format('d F Y H:i A') }}</td>
                                        <td>
                                            @if ($row->status === 1)
                                                <span class="badge bg-success rounded-pill">Success</span>
                                            @else
                                                <span class="badge bg-danger rounded-pill">in-active</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route($info->form_edit, $row->id) }}" class="edit"><i
                                                    class="material-symbols-outlined">edit</i></a>
                                            <span class="delete d-inline-block" style="cursor: pointer"><i
                                                    class="material-symbols-outlined text-danger">delete</i></span>
                                            <form action="{{ route($info->form_destroy, $row->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                            </form>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            No Data
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">{{ $data->links() }}
                            </li>
                        </ul>
                    </nav>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
        <!-- end row-->
    </div>
    @push('customJs')
        <script>
            $('#title').on('keyup', function() {
                categoryName = $(this).val();
                slug = categoryName.trim().toLowerCase().replace(/[^a-zA-Z0-9]+/g, '-');
                $('#slug').val(slug);
            })

            $(document).ready(function() {
                $('.delete').on('click', function() {
                    var form = $(this).next('form');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            form.submit()
                        }
                    })
                })
            })
        </script>
    @endpush
@endsection
