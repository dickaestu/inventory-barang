@extends('layouts.main')
@section('title','Product Category')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>Product Category</h4>
                <a href="{{ route('product-category.create') }}" class="btn btn-small btn-primary"><i class="fas fa-plus"></i> Create Product Category</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                            <tr>
                                <th>ID Category</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Hardware</td>
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