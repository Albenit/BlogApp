@extends('layouts.app')

@section('content')
    <div class="shadow-sm" style="background-color: #fffcf5">
        <div class="container">
            <div class="row ">
                <div class="col-12 col-lg-7 my-auto">
                    <div class="">
                        <div class="mb-3">
                            <span style="color:black;font-weight:700; font-size:20px">Create an Art that shows the beauty in
                                everyone's ideas of flaws. </span>
                        </div>
                        <div>
                            <span>Lorem Impsum Lorem Impsum Lorem Impsum Lorem Impsum Lorem Impsum Lorem Impsum Lorem Impsum
                                Lorem Impsum Lorem Impsum Lorem Impsum Lorem Impsum Lorem Impsum Lorem Impsum Lorem Impsum
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="justify-content-end d-flex my-5" style="">
                        <img src="{{ url('uploads/lips.jpg') }}" style="height: 350px; width:300px; border-radius:20px "
                            class="card-img-top" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="justify-content-end d-flex">
            <form action="{{ route('home') }}">
                <div class="row mt-4">
                    <div class="col-auto">
                        <div class="my-auto " style="width 250px">
                            <input type="text" class="form-control" placeholder="Search Blog" name="search_blog"
                                value="{{ $search_blog }}">
                            <input type="submit" hidden>
                        </div>
                    </div>
                    <div class="col px-0">
                        <select class="form-select" name="blog_category">
                            <option value="">All Categories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>

                </div>
            </form>
        </div>
        <div class="mt-5">
            <div class="row h-100">
                @foreach ($blogs as $blog)
                    <div class="col-12 col-md-6 col-xl-3 mb-3">
                        <div class="card">
                            <img src="{{ url('uploads/' . $blog->image) }}" style="height: 200px;" class="card-img-top"
                                alt="Fissure in Sandstone" />
                            <div class="card-body">
                                <div class="row">
                                    <div>
                                        <span class="card-title"
                                            style="font-weight:700;font-size:18px">{{ $blog->title }}</span>
                                        <span class="" style="cursor: pointer" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" v-pre>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                                <path
                                                    d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                            </svg>
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item"
                                                href="{{ route('edit-blog-view', ['id' => Illuminate\Support\Facades\Crypt::encrypt($blog->id)]) }}">
                                                Edit
                                            </a>
                                            <a class="dropdown-item"
                                                href="{{ route('delete-blog', ['id' => Illuminate\Support\Facades\Crypt::encrypt($blog->id)]) }}">
                                                Delete
                                            </a>
                                        </div>
                                    </div>

                                </div>
                                <p class="card-text">{{ $blog->body }}.</p>
                                <p class="text-end mb-0" style="font-size: 12px">{{ $blog->published_at }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
