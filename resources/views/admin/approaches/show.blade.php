@extends('layouts.admin')
@section('title')
Show Approach {{ $approach->id }}
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
            <h4>Approach id {{ $approach->id }}</h4>
            <div class="card-header-form">
                <a href="{{ route('admin.approaches.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tbody>
                        <tr>
                            <th> ID
                            <td>{{ $approach->id }}</td>
                            </th>
                        </tr>

                        <tr>
                            <th>Title (uz)
                            <td>{{ $approach->title_uz }}</td>
                            </th>
                        </tr>
                        <tr>
                            <th>Title (ru)
                            <td>{{ $approach->title_ru }}</td>
                            </th>
                        </tr>
                        <tr>
                            <th>Title (en)
                            <td>{{ $approach->title_en }}</td>
                            </th>
                        </tr>


                        <tr>
                            <th>Body (UZ)
                            <td>{!!$approach->body_uz!!}</td>

                            </th>
                        </tr>
                        <tr>
                            <th>Body (Ru)
                            <td>{!!$approach->body_ru!!}</td>

                            </th>
                        </tr>
                        <tr>
                            <th>Body (EN)
                            <td>{!! $approach->body_en!!}</td>

                            </th>
                        </tr>


                        <tr>
                            <th> Icon
                            <td>{{ $approach->icon }}</td>
                            </th>
                        </tr>

                            <th> Created At
                            <td>{{ $approach->created_at }}</td>

                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
