@extends('layouts.main')
@section('title','Movement Request')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>Movement Request</h4>
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
                                    @if ($item->status == 'accepted')
                                        <a href="#" target="_blank" class="btn btn-primary btn-small">Print Invoice</a>
                                    @else   
                                        <form action="{{ route('movement-request.update',$item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" value="accepted" name="status" class="btn btn-success btn-small">Approve</button>
                                        </form>
                                        <form action="{{ route('movement-request.update',$item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" value="rejected" name="status" class="btn btn-danger btn-small">Reject</button>
                                        </form>
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