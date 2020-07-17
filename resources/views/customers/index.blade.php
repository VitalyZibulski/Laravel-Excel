@extends('layouts.app')

@section('content')
    <div class="panel-heading">Customers</div>
    <div class="panel-body">
        <a href="{{ route('customers.export_view') }}" class="btn btn-primary">Download all customers</a>

        <a href="{{ route('customers.export_format', 'Csv') }}" class="btn btn-info">Download CSV</a>
        <a href="{{ route('customers.export_format', 'Html') }}" class="btn btn-info">Download HTML</a>
        <a href="{{ route('customers.export_format', 'Dompdf') }}" class="btn btn-info">Download PDF</a>
        <br /><br />

        @include('customers.table', $customers)
    </div>
@endsection
