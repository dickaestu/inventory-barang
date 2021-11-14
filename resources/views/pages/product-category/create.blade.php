@extends('layouts.main')
@section('title','Create Product Category')

@section('content')
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent">
                <li class="breadcrumb-item"><a href="{{ route('product-category.index') }}">Back</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Product Category</li>
            </ol>
        </nav>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Create Product Category</h4>
            </div>
            <form action="#" method="POST" class="needs-validation" novalidate>
                <div class="card-body">
                    @csrf
                    
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input placeholder="Please input category name..." type="text" name="category_name" id="category_name" value="{{ old('category_name') }}" class="form-control @error('category_name') is-invalid @enderror"  required>
                        <div class="invalid-feedback">
                            Category name is invalid
                        </div>
                        @error('category_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection