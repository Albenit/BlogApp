@extends('layouts.app')

@section('content')
<div>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @elseif(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>   
    @endif
    <div class="justify-content-center d-flex mt-5 mx-3">
        <div class="col-12 col-lg-4 shadow p-3  mb-5 bg-body rounded p-4">
            <h3>Create Blog</h3>
            <div>
                <form action="{{route('save-blog')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                        <input name="blog_title" type="text" class="form-control" placeholder="title">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Body</label>
                        <input name="blog_body" type="text" class="form-control" placeholder="Body">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Image</label>
                        <input name="blog_image" type="file" class="form-control" placeholder="Image">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Category</label>
                        <select name="blog_category" class="form-select mb-2">
                            @foreach(App\Models\Category::all() as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-center ">
                        <button type="submit" class="btn btn-success col-3">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection