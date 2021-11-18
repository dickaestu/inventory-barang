@extends('layouts.main')
@section('title','Product List')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>Product List</h4>
                <a href="{{ route('product-list.create') }}" class="btn btn-small btn-primary"><i class="fas fa-plus"></i> Create Product List</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Category Product</th>
                                <th>Qty</th>
                                <th>UOM</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Fiber Optic</td>
                                <td>Test</td>
                                <td>1</td>
                                <td>Unit</td>
                                <td>01-01-2021 00:00</td>
                                <td>
                                    <button class="btn btn-warning btn-small btn-icon"><i class="fas fa-pencil-alt"></i></button>
                                    <button class="btn btn-danger btn-small btn-icon"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection