@extends('layouts.app')
@section('title','Edit Blog')
@section('content')
    <div>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="justify-content-center d-flex mt-5 mx-3">
            <div class="col-12 col-lg-4 shadow p-3  mb-5 bg-body rounded p-4">
                <h3>Edit Blog</h3>
                <form action="{{ route('edit-blog', ['id' => Illuminate\Support\Facades\Crypt::encrypt($blog->id)]) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                        <input name="blog_title" type="text" class="form-control" value="{{ $blog->title }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Body</label>
                        <input name="blog_body" type="text" class="form-control" value="{{ $blog->body }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Image</label>
                        <input name="blog_image" type="file" class="form-control" value="{{ $blog->image }}">
                    </div>
                    <select name="blog_category" class="form-select mb-2">
                        <option value="{{ $blog->category_id }}">{{ $blog->category->category_name }}</option>
                        <option value="2">Test</option>
                    </select>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
