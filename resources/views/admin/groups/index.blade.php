@extends('layouts.admin')
@section('title')
    Groups
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
                <h4>Groups table</h4>
                <div class="card-header-form">
                    <a href="{{ route('admin.groups.create') }}" class="btn btn-primary">Create</a>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <tbody>
                        <tr>
                            <th>#</th>
                            <th>Title(UZ)</th>
                            <th>Students</th>
                            <th>Age</th>

                            <th>Images</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($groups as $group)
                            <tr>
                                <td>{{$loop->iteration }}</td>
                                <td>{{$group->title_uz }}</td>
                                <td>{{$group->students}} </td>
                                <td>{{$group->age}} </td>
                                <td>
                                    <img alt="image" src="/site/images/groups/{{$group->images}}" width="35">

                                </td>
                                <td>
                                    <form style="display: inline" action="{{ route('admin.groups.destroy',$group->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button href="#" class="btn btn-danger" onclick="return confirm('Ochirishni xohlisizmi?')" type="submit">Delete</button>
                                    </form>
                                    <a href="{{ route('admin.groups.edit',$group->id) }}" class="btn btn-success">Edit</a>
                                    <a href="{{ route('admin.groups.show',$group->id) }}" class="btn btn-warning">Show</a>
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
