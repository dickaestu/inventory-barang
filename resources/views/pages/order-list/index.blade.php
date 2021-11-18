@extends('layouts.main')
@section('title','Order List')

@section('content')
<div class="row">
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h6>Export By Date</h6>
            </div>
            <div class="card-body">
                <form target="_blank" action="{{ route('order-list.export-filter') }}" method="GET">
                @csrf
                    <div class="form-group">
                        <label for="">Start Date</label>
                        <input type="date" name="startDate" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">End Date</label>
                        <input type="date" name="endDate" required class="form-control">
                    </div>

                    <button class="btn btn-small btn-primary">Export</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between border-bottom-0">
                <h4>Order List</h4>
                <a href="{{ route('order-list.create') }}" class="btn btn-small btn-primary"><i class="fas fa-plus"></i> Create Order List</a>
            </div>
            <div class="card-header d-flex justify-content-end">
                <a target="_blank" href="{{ route('order-list.export') }}" class="btn btn-small btn-success"><i class="fas fa-file"></i> Export All</a>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Invoice No</th>
                                <th>Product</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Order Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                                <tr>
                                    <td>ORM-{{ $item->id }}</td>
                                    <td>{{ $item->productList->product_name }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->phone_number }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ Carbon\Carbon::create($item->created_at)->format('d-m-Y H:i') }}</td>
                                    <td>
                                        @if ($item->status == "pending")
                                            <a href="{{ route('order-list.edit',$item->id) }}" class="btn btn-warning btn-small btn-icon"><i class="fas fa-pencil-alt"></i></a>
                                            <form class="d-inline" action="{{ route('order-list.destroy',$item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-small btn-icon"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        @else 
                                            <a href="#" class="btn btn-secondary disabled btn-small btn-icon"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="#" class="btn btn-secondary disabled btn-small btn-icon"><i class="fas fa-trash-alt"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Data Kosong</td>
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