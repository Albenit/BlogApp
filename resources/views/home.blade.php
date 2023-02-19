@extends('layouts.app')

@section('content')
    @section('search-box')
        <div class="my-auto ">
            <input type="text" class="form-control" placeholder="Search Blog">
        </div>
    @endsection
    <div style="background-color: rgb(214, 214, 214)">
        <h1>aaa</h1>
        <h1>aaa</h1>
        <h1>aaa</h1>
        <h1>aaa</h1>
        <h1>aaa</h1>
    </div>
    <div class="container">
        <div>
            <div class="row h-100">
                @foreach ($blogs as $blog)
                    <div class="col-3 mb-3">
                        <div class="card">
                            <img src="{{ url('uploads/' . $blog->image) }}" style="height: 200px;" class="card-img-top"
                                alt="Fissure in Sandstone" />
                            <div class="card-body">
                                <div class="row">
                                    <div>
                                        <span class="card-title">{{ $blog->title }}</span>
                                        <span style="cursor: pointer" data-bs-toggle="dropdown" aria-haspopup="true"
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
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
