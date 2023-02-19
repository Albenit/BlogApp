@extends('layouts.app')

@section('content')
<div>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <h3>Create Blog</h3>
    <form action="{{route('edit-blog',['id' => Illuminate\Support\Facades\Crypt::encrypt($blog->id)])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input name="blog_title" type="text" class="form-control" value="{{$blog->title}}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Body</label>
            <input name="blog_body" type="text" class="form-control" value="{{$blog->body}}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Image</label>
            <input name="blog_image" type="file" class="form-control" value="{{$blog->image}}">
        </div>
        <select name="blog_category" class="form-select mb-2">
            <option value="{{$blog->category_id}}">{{$blog->category->category_name}}</option>
            <option value="2">Test</option>
        </select>
        <div class="">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>
</div>
@endsection