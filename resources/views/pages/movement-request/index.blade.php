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
                                <th>Package</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Order Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>ORM-1</td>
                                <td>Fiber Optic</td>
                                <td>Andre Kresna</td>
                                <td>08123123221</td>
                                <td>Movement Request Approve By Admin</td>
                                <td>01-01-2021 00:00</td>
                                <td>
                                    <button class="btn btn-success btn-small">Approve</button>
                                    <button class="btn btn-danger btn-small">Reject</button>
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