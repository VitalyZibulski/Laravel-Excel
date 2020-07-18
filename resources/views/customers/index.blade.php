@extends('layouts.app')

@section('content')
    <div class="panel-heading">Customers</div>
    <div class="panel-body">
        <a href="{{ route('customers.export_view') }}" class="btn btn-primary">Download all customers</a>

        <a href="{{ route('customers.export_format', 'Csv') }}" class="btn btn-info">Download CSV</a>
        <a href="{{ route('customers.export_format', 'Html') }}" class="btn btn-info">Download HTML</a>
        <a href="{{ route('customers.export_format', 'Dompdf') }}" class="btn btn-info">Download PDF</a>

        <a href="{{ route('customers.export_sheets') }}" class="btn btn-info">Export info Multiple Sheets</a>

        <a href="{{ route('customers.export_heading') }}" class="btn btn-info">Export with Heading Row</a>

        <a href="{{ route('customers.export_mapping') }}" class="btn btn-info">Export Purchases</a>

        <a href="{{ route('customers.export_styling') }}" class="btn btn-info">Export with Styling</a>
        <br /><br />

        @include('customers.table', $customers)
    </div>
@endsection
