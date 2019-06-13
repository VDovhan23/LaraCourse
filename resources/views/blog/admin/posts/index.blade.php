@extends('layouts.app')

@section('content')
<div class="container">
        @if(session('success'))
            <div class="row justify-content-center">
                <div class="col-12">

                </div>
            </div>
        @endif


    <div class="row justify-content-center">
        <div class="col-12">
            <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                <a href="{{route('blog.admin.posts.create')}}" class="btn btn-primary"> Create Post</a>
            </nav>
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Slug</th>
                                <th>Published At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paginate as $post)
                                <tr @if (!$post->is_published) style="background-color: #ccc;" @endif>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->user_id}}</td>
                                    <td>{{$post->category_id}}</td>
                                    <td>
                                        <a href="{{route('blog.admin.posts.edit', $post->id)}}">{{$post->title}}</a>
                                    </td>
                                    <td>
                                        {{$post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('d.m H:i' ): ''}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @if ($paginate->total() > $paginate->count())
        <br>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        {{$paginate->links()}}
                    </div>
                </div>
            </div>
        </div>

    @endif
</div>


@endsection
