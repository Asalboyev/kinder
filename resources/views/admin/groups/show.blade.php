@extends('layouts.admin')
@section('title')
    Show Group {{$group->id }}
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
                <h4>groups id {{ $group->id }}</h4>
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
                            <td>{{$group->id }}</td>
                            </th>
                        </tr>

                        <tr>
                            <th>Title (uz)
                            <td>{{$group->title_uz }}</td>
                            </th>
                        </tr>
                        <tr>
                            <th>Title (ru)
                            <td>{{$group->title_ru }}</td>
                            </th>
                        </tr>
                        <tr>
                            <th>Title (en)
                            <td>{{$group->title_en }}</td>
                            </th>
                        </tr>


                        <tr>
                            <th>Age
                            <td>{{$group->age}}</td>

                            </th>
                        </tr>
                        <tr>
                            <th>Studeent
                            <td>{{$group->students}}</td>

                            </th>
                        </tr>

                        <tr>
                            <th> Images
                            <td>
                                <img alt="image" src="/site/images/groups/{{$group->images}}" width="35">

                            </td>
                            </th>
                        </tr>

                        <tr>
                            <th> Slug
                            <td>{{$group->slug }}</td>
                            </th>
                        </tr>

                        <th> Created At
                        <td>{{$group->created_at }}</td>

                        </th>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
