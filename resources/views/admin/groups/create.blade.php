@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="/admin/assets/bundles/select2/dist/css/select2.min.css">
@endsection

@section('title')
    Create Group
@endsection
@section('content')
    <div class="col-12 col-md-12 col-lg-12">
        <form action="{{ route('admin.groups.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h4>Create Group </h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Title (UZ)</label>
                        <input type="text" class="form-control" required name="title_uz" @error('title_uz') is-invalid @enderror>
                        @error('title_uz')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Title (RU)</label>
                        <input type="text" class="form-control" required name="title_ru" @error('title_ru') is-invalid @enderror>
                        @error('title_ru')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Title (En)</label>
                        <input type="text" class="form-control" required name="title_en" @error('title_en') is-invalid @enderror>
                        @error('title_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                        <div class="form-group">
                            <label>Age</label>
                            <input type="text" class="form-control"  name="age">
                        </div>
                        <div class="form-group">
                            <label>Students</label>
                            <input type="number" class="form-control"  name="students">
                        </div>
                    <div class="form-group">
                        <label>Images</label>
                        <input type="file" class="form-control"  name="images">
                    </div>

                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </div>
        </form>
    </div>
@endsection
@section('js')

    <script src="//cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    <script src="/admin/assets/bundles/select2/dist/js/select2.full.min.js"></script>



@endsection
