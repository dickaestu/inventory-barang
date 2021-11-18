@extends('layouts.main')
@section('title','Edit Product Category')

@section('content')
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent">
                <li class="breadcrumb-item"><a href="{{ route('product-category.index') }}">Back</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Product Category</li>
            </ol>
        </nav>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Product Category</h4>
            </div>
            <form action="{{ route('product-category.update',$item->id) }}" method="POST" class="needs-validation" novalidate>
                <div class="card-body">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="category">Category Name</label>
                        <input placeholder="Please input category name..." type="text" name="category" id="category" value="{{ $item->category}}" class="form-control @error('category') is-invalid @enderror"  required>
                        <div class="invalid-feedback">
                            Category name is invalid
                        </div>
                        @error('category')
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