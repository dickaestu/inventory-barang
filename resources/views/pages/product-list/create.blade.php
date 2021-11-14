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
            <form action="#" method="POST" class="needs-validation" novalidate>
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
                        <label for="spect_product">Spec Product</label>
                        <input placeholder="Please input spec product..." type="text" name="spec_product" id="spec_product" value="{{ old('spec_product') }}" class="form-control @error('spec_product') is-invalid @enderror"  required>
                        <div class="invalid-feedback">
                            Spec product is invalid
                        </div>
                        @error('spec_product')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input placeholder="Please input quantity..." type="number" name="quantity" id="quantity" value="{{ old('quantity') }}" class="form-control @error('quantity') is-invalid @enderror"  required>
                        <div class="invalid-feedback">
                            Quantity is invalid
                        </div>
                        @error('quantity')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="uom">UOM</label>
                        <input placeholder="Please input UOM..." type="text" name="uom" id="uom" value="{{ old('uom') }}" class="form-control @error('uom') is-invalid @enderror"  required>
                        <div class="invalid-feedback">
                            Product name is invalid
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