@extends('layouts.master')

@section('title', 'All Category | Admin')

@section('css')
    <link href="{{ asset('assets/backend/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css') }}"
        rel="stylesheet" />
    <style>
        .inner {
            display: inline-block;
        }

        .td {
            text-align: center;
        }
    </style>
@endsection

@section('main')

    <div class="card card-default">

        <div class="card-header">
            <h2>ALL POSTS</h2>
        </div>

        <div class="card-body table-responsive">

            <table class="table align-middle" id="posts">

                <thead>

                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">CREATOR</th>
                        <th scope="col">TITLE</th>
                        <th scope="col">DESCRIPTION</th>
                        <th scope="col">STATUS</th>
                        <th scope="col">ACTION</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach ($posts as $post)
                        <tr>

                            <td scope="row">{{ $post->id }}</td>

                            <td>{{ Str::limit($post->user->name, 5, '...') }}</td>

                            <td>{{ Str::limit($post->title, 5, '...') }}</td>

                            <td>{{ Str::limit($post->description, 5, '...') }}</td>

                            <td>{{ $post->status == 1 ? 'ACTIVE' : 'DEACTIVE' }}</td>

                            <td id="outer">

                                @if (!$post->trashed())
                                    <a href="{{ route('post.show', $post->id) }}"
                                        class="btn btn-outline-info btn-sm inner"><i class="fa fa-info"
                                            aria-hidden="true"></i></a>

                                    <a href="{{ route('post.edit', $post->id) }}"
                                        class="btn btn-outline-info btn-sm inner"><i class="fa fa-edit"
                                            aria-hidden="true"></i></a>

                                    <form method="POST" class="inner" action="{{ route('post.destroy', $post->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-warning btn-sm"><i class="fa-solid fa-trash"
                                                aria-hidden="true"></i></button>
                                    </form>
                                @endif

                                @if ($post->trashed())
                                    <a href="{{ route('post.retrive', $post->id) }}"
                                        class="btn btn-outline-dark btn-sm inner"><i class="fa fa-undo"
                                            aria-hidden="true"></i></a>

                                    <a href="{{ route('post.permaDel', $post->id) }}"
                                        class="btn btn-outline-danger btn-sm inner"><i class="fa fa-close"></i></a>
                                @endif

                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>


            <div class="mt-2">
                {{ $posts->links() }}
            </div>

        </div>

    </div>

@endsection


@section('js')

    <script src="{{ asset('assets/backend/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>

    <script>
        $(document).ready(function() {

            $('#posts').DataTable({
                "bLengthChange": false,
                "bPaginate": false,
                "bInfo": false
            });

        });
    </script>

    @if (session()->has('success'))
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: '<p class="fs-5">{{ Session::get('success') }}</p>',
                showConfirmButton: false,
                timer: 1500,
            })
        </script>
    @endif
@endsection
