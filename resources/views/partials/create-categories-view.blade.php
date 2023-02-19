@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @elseif(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->category_name }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>
                            <div>
                                <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#openModal{{$category->id}}">Edit</button>
                                <a class="btn btn-danger"
                                    href="{{ route('delete-categorie', ['id' => Illuminate\Support\Facades\Crypt::encrypt($category->id)]) }}">Delete</a>
                            </div>
                        </td>
                    </tr>
                    {{-- Modal for edit --}}
                    <div class="modal fade" id="openModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Create New Categorie</h5>
                                </div>
                                <form action="{{ route('update-categorie', ['id' => Illuminate\Support\Facades\Crypt::encrypt($category->id)]) }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Category Name</label>
                                            <input name="category_name" type="text" class="form-control"
                                                value="{{ $category->category_name }}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
        <div class="text-end">
            <button data-bs-toggle="modal" data-bs-target="#openModal" class="btn btn-primary">Add New</button>
        </div>
        <div class="modal fade" id="openModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create New Categorie</h5>
                    </div>
                    <form action="{{ route('save-categorie') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Category Name</label>
                                <input name="category_name" type="text" class="form-control" placeholder="Category Name">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
