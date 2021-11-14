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
            <form action="#" method="POST" class="needs-validation" novalidate>
                <div class="card-body">
                    @csrf
                    
                    <div class="form-group">
                        <label for="package">Package</label>
                        <input placeholder="Please input package..." type="text" name="package" id="package" value="{{ old('package') }}" class="form-control @error('package') is-invalid @enderror"  required>
                        <div class="invalid-feedback">
                            Package is invalid
                        </div>
                        @error('package')
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
                        <label for="phone">Phone Number</label>
                        <input placeholder="Please input phone number..." type="number" name="phone" id="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror"  required>
                        <div class="invalid-feedback">
                            Phone number is invalid
                        </div>
                        @error('phone')
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