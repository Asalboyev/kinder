@extends('layouts.admin')
@section('title')
Products
@endsection
@section('content')
<div class="col-12 col-md-12 col-lg-12">
    <div class="card">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>×</span>
                </button>
                {{ session('success') }}
            </div>
        </div>
        @endif
        <div class="card-header">
            <h4>Product table</h4>
            <div class="card-header-form">
                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Create</a>
            </div>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tbody>
                        <tr>
                            <th>#</th>
                            <th>Title(UZ)</th>
                            <th>Body(UZ)</th>

                            <th>Slug</th>
                            <th>Images</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{$loop->iteration }}</td>
                            <td>{{$post->title_uz }}</td>
                            <td>
                                @php
                                    $text = $post->body_uz;
                                    $chunks = str_split($text, 30);
                                    echo implode('<br>', $chunks);
                                @endphp
                            </td>
                            <td>{{$post->slug }}</td>
                            <td>
                                <img alt="image" src="/site/images/posts/{{$post->images}}" width="35">

                            </td>
                            <td>
                                <form style="display: inline" action="{{ route('admin.posts.destroy',$post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button href="#" class="btn btn-danger" onclick="return confirm('Ochirishni xohlisizmi?')" type="submit">Delete</button>
                                </form>
                                <a href="{{ route('admin.posts.edit',$post->id) }}" class="btn btn-success">Edit</a>
                                <a href="{{ route('admin.posts.show',$post->id) }}" class="btn btn-warning">Show</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-right">
            <nav class="d-inline-block">
            </nav>
        </div>
    </div>
</div>
@endsection
