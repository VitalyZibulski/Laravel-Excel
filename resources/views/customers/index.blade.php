@extends('layouts.app')

@section('content')
    <div class="panel-heading">Customers</div>
    <div class="panel-body">
        <a href="{{ route('customers.export_view') }}" class="btn btn-primary">Export all customers</a>

        <a href="{{ route('customers.export_store') }}" class="btn btn-primary">Store as File</a>
        <br /><br />
        @include('customers.table', $customers)
    </div>
@endsection
