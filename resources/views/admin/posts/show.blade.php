@extends('layouts.admin')
@section('title')
Show Product {{ $post->id }}
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
            <h4>category id {{ $post->id }}</h4>
            <div class="card-header-form">
                <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tbody>
                        <tr>
                            <th> ID
                            <td>{{ $post->id }}</td>
                            </th>
                        </tr>

                        <tr>
                            <th>Title (uz)
                            <td>{{ $post->title_uz }}</td>
                            </th>
                        </tr>
                        <tr>
                            <th>Title (ru)
                            <td>{{ $post->title_ru }}</td>
                            </th>
                        </tr>
                        <tr>
                            <th>Title (en)
                            <td>{{ $post->title_en }}</td>
                            </th>
                        </tr>


                        <tr>
                            <th>Body (UZ)
                            <td>{!!$post->body_uz!!}</td>

                            </th>
                        </tr>
                        <tr>
                            <th>Body (Ru)
                            <td>{!!$post->body_ru!!}</td>

                            </th>
                        </tr>
                        <tr>
                            <th>Body (EN)
                            <td>{!! $post->body_en!!}</td>

                            </th>
                        </tr>
                        <tr>
                            <th> Images
                            <td>
                                    <img alt="image" src="site/images/posts/{{$po  st->images}}" width="80">

                            </td>
                            </th>
                        </tr>

                        <tr>
                            <th> Slug
                            <td>{{ $post->slug }}</td>
                            </th>
                        </tr>

                            <th> Created At
                            <td>{{ $post->created_at }}</td>

                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
