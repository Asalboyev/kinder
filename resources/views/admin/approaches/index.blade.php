@extends('layouts.admin')
@section('title')
    Approaches
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
            <h4>Approaches table</h4>
            <div class="card-header-form">
                <a href="{{ route('admin.approaches.create') }}" class="btn btn-primary">Create</a>
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
                            <th>Icon</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($approaches as $approach)
                        <tr>
                            <td>{{$loop->iteration }}</td>
                            <td>{{$approach->title_uz }}</td>
                            <td>
                                @php
                                    $text = $approach->body_uz;
                                    $chunks = str_split($text, 30);
                                    echo implode('<br>', $chunks);
                                @endphp
                            </td>
                            <td > <i class="{{$approach->icon}}"></i></td>
                            <td>
                                <form style="display: inline" action="{{ route('admin.approaches.destroy',$approach->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button href="#" class="btn btn-danger" onclick="return confirm('Ochirishni xohlisizmi?')" type="submit">Delete</button>
                                </form>
                                <a href="{{ route('admin.approaches.edit',$approach->id) }}" class="btn btn-success">Edit</a>
                                <a href="{{ route('admin.approaches.show',$approach->id) }}" class="btn btn-warning">Show</a>
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
