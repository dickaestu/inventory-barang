@extends('layouts.main')
@section('title','Create Product List')

@section('content')
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent">
                <li class="breadcrumb-item"><a href="{{ route('product-list.index') }}">Back</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Product List</li>
            </ol>
        </nav>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Create Product List</h4>
            </div>
            <form action="{{ route('product-list.store') }}" method="POST" class="needs-validation" novalidate>
                <div class="card-body">
                    @csrf
                    
                    <div class="form-group">
                        <label for="product_name">Product Name</label>
                        <input placeholder="Please input product name..." type="text" name="product_name" id="product_name" value="{{ old('product_name') }}" class="form-control @error('product_name') is-invalid @enderror"  required>
                        <div class="invalid-feedback">
                            Product name is invalid
                        </div>
                        @error('product_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="product_category_id">Category Product</label>
                        <select  name="product_category_id" id="product_category_id" class="form-control @error('product_category_id') is-invalid @enderror"  required> 
                            <option value="">Choose Category</option>
                            @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->category }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Category product is invalid
                        </div>
                        @error('product_category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input placeholder="Please input quantity..." type="number" min="0" name="quantity" id="quantity" value="{{ old('quantity') }}" class="form-control @error('quantity') is-invalid @enderror"  required>
                        <div class="invalid-feedback">
                            Quantity is invalid
                        </div>
                        @error('quantity')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="uom">UOM</label>
                        <select  name="uom" id="uom" class="form-control @error('uom') is-invalid @enderror"  required> 
                            <option value="">Choose UOM</option>
                            <option value="Unit">Unit</option>
                            <option value="Pcs">Pcs</option>
                            <option value="Meter">Meter</option>
                            <option value="Roll">Roll</option>
                        </select>                       
                        <div class="invalid-feedback">
                            UOM is invalid
                        </div>
                        @error('uom')
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