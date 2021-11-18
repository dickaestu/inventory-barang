@extends('layouts.main')
@section('title','Product List')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>Product List</h4>
                @if (Auth::user()->roles != 'Teknisi')
                <a href="{{ route('product-list.create') }}" class="btn btn-small btn-primary"><i class="fas fa-plus"></i> Create Product List</a>
                @endif
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
                            @forelse ($items as $item)
                            <tr>
                                <td>{{ $item->product_name }}</td>
                                <td>{{ $item->productCategory->category }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->uom }}</td>
                                <td>{{ Carbon\Carbon::create($item->created_at)->format('d-m-Y H:i') }}</td>
                                <td>
                                    @if (Auth::user()->roles != 'Teknisi')
                                    <a href="{{ route('product-list.edit', $item->id) }}" class="btn btn-warning btn-small btn-icon"><i class="fas fa-pencil-alt"></i></a>
                                    <form class="d-inline" action="{{ route('product-list.destroy',$item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-small btn-icon"><i class="fas fa-trash-alt"></i></button>
                                        
                                    </form>
                                    @else
                                    <a href="#" class="btn btn-secondary disabled btn-small btn-icon"><i class="fas fa-pencil-alt"></i></a>
                                    <form class="d-inline" action="#" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-secondary disabled btn-small btn-icon"><i class="fas fa-trash-alt"></i></button>

                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Data Kosong</td>
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