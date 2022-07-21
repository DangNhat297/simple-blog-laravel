@extends('layout.admin.master')

@section('title', 'Home Page')

@section('title-heading', 'Home')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Add Category</h3>
            </div>
            <!--begin::Form-->
            <form id="add-category">
                <div class="card-body">
                    <div class="form-group">
                        <label>Category Name
                            <span class="text-danger">*</span></label>
                        <input type="text" name="cat-name" class="form-control" placeholder="Enter category" required="">
                        <span class="form-text text-muted error category"></span>
                    </div>
                    <div class="form-group">
                        <label>Category Thumbnail</label>
                        <div></div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="thumbnail" accept=".png, .jpg, .jpeg, .jfif" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        <div class="form-group preview-image" style="margin-top: 10px;"></div>
                        <span class="form-text text-muted error thumbnail"></span>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="btn-add-category" class="btn btn-primary mr-2">Add</button>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
@endsection