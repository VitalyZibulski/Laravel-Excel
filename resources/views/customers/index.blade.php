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
        <a href="{{ route('customers.export_autosize') }}" class="btn btn-info">Export with Autosize</a>
        <a href="{{ route('customers.export_dateformat') }}" class="btn btn-info">Export with date formats</a>
        <a href="{{ route('customers.export_mergecells') }}" class="btn btn-info">Export with Merge Cells</a>
        <a href="{{ route('customers.export_formulas') }}" class="btn btn-info">Export Transactions</a>

        <br /><br />

        @if (session('error'))
            <div class="alert alert-info">{{ session('error') }}</div>
        @endif

        @if (session('message'))
            <div class="alert alert-info">{{ session('message') }}</div>
        @endif

        <form action="{{ route('customers.import_large') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="import" />
            <input type="submit" class="btn btn-sm btn-primary" value="Import File" />
        </form>

        <br />

        <form action="{{ route('customers.import_relationships') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="import" />
            <input type="submit" class="btn btn-sm btn-primary" value="Import File" />
        </form>

        <form action="{{ route('customers.import_dateformat') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="import" />
            <input type="submit" class="btn btn-sm btn-primary" value="Import File" />
        </form>

        <form action="{{ route('customers.import_errors') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="import" />
            <input type="submit" class="btn btn-sm btn-primary" value="Import File" />
        </form>

        @include('customers.table', $customers)
    </div>
@endsection
