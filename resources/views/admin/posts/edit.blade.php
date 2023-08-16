@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="/admin/assets/bundles/select2/dist/css/select2.min.css">
@endsection
@section('title')
Update Product
@endsection
@section('content')
<div class="col-12 col-md-1 col-lg-12">
    <form action="{{ route('admin.posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header">
                <h4>Create Product </h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Title (UZ)</label>
                    <input type="text" class="form-control" required value="{{$post->title_uz}}" name="title_uz" @error('title_uz') is-invalid @enderror>
                    @error('title_uz')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Title (RU)</label>
                    <input type="text" class="form-control" required value="{{$post->title_ru}}" name="title_ru" @error('title_ru') is-invalid @enderror>
                    @error('title_ru')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Title (En)</label>
                    <input type="text" class="form-control" required value="{{$post->title_en}}" name="title_en" @error('title_en') is-invalid @enderror>
                    @error('title_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Body (UZ)</label>
                    <textarea type="text" class="form-control ckeditor" name="body_uz"{!! $post->body_uz!!} > </textarea>
                    @error('body_uz')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Body (RU)</label>
                    <textarea type="text" class="form-control ckeditor"  name="body_ru"{!! $post->body_ru !!} ></textarea>
                    @error('body_ru')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Body (EN)</label>
                    <textarea type="text" class="form-control ckeditor"  name="body_en"{!! $post->body_en !!} ></textarea>
                    @error('body_en')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Images</label>
                    <input type="file" class="form-control" naccept="image/*" name="images[]" multiple>
                </div>
                <div class="form-group">
                    <label>Slug</label>
                    <input type="text" class="form-control" name="slug">
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


<script type="text/javascript">
    CKEDITOR.replace('body_uz', {
        filebrowserUploadUrl: "{{route('admin.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    CKEDITOR.replace('body_ru', {
        filebrowserUploadUrl: "{{route('admin.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    CKEDITOR.replace('body_en', {
        filebrowserUploadUrl: "{{route('admin.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection
