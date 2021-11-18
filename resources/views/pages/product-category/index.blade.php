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
                            @forelse ($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->category }}</td>
                                <td>
                                    <a href="{{ route('product-category.edit',$item->id) }}" class="btn btn-warning btn-small btn-icon"><i class="fas fa-pencil-alt"></i></a>
                                    <form class="d-inline" action="{{ route('product-category.destroy',$item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-small btn-icon"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center">Data Kosong</td>
                            </tr>
                            @endforelse
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection