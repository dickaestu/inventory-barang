@extends('layouts.main')
@section('title','Create Order List')

@section('content')
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent">
                <li class="breadcrumb-item"><a href="{{ route('order-list.index') }}">Back</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Order List</li>
            </ol>
        </nav>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Create Order List</h4>
            </div>
            <form action="{{ route('order-list.store') }}" method="POST" class="needs-validation" novalidate>
                <div class="card-body">
                    @csrf
                    
                    <div class="form-group">
                        <label for="product_list_id">Product</label>
                        <select  name="product_list_id" id="product_list_id" class="form-control @error('product_list_id') is-invalid @enderror"  required> 
                            <option value="">Choose Product</option>
                            @foreach ($product_lists as $item)
                                <option value="{{ $item->id }}">{{ $item->product_name }}</option>
                            @endforeach
                        </select>                        
                        <div class="invalid-feedback">
                            Product is invalid
                        </div>
                        @error('product_list_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input placeholder="Please input name..." type="text" name="name" id="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror"  required>
                        <div class="invalid-feedback">
                            Name is invalid
                        </div>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input placeholder="Please input phone number..." min="0" type="number" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" class="form-control @error('phone_number') is-invalid @enderror"  required>
                        <div class="invalid-feedback">
                            Phone number is invalid
                        </div>
                        @error('phone_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input placeholder="Please input quantity..." min="0" type="number" name="quantity" id="quantity" value="{{ old('quantity') }}" class="form-control @error('quantity') is-invalid @enderror"  required>
                        <div class="invalid-feedback">
                            Phone number is invalid
                        </div>
                        @error('quantity')
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