<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Exports\CustomersExportDateFormat;
use App\Exports\CustomersExportHeading;
use App\Exports\CustomersExportMapping;
use App\Exports\CustomersExportSheets;
use App\Exports\CustomersExportSize;
use App\Exports\CustomersExportStyling;
use App\Exports\CustomersExportView;
use App\Imports\CustomersImport;
use App\Imports\CustomersImportDateFormat;
use App\Imports\CustomersImportLarge;
use App\Imports\CustomersImportRelationships;
use Illuminate\Http\Request;
use App\Exports\CustomersExport;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        return view('customers.index', compact('customers'));
    }

    public function export()
    {
        return Excel::download(new CustomersExport(), 'customers.xlsx');
    }

    public function export_view()
    {
        return Excel::download(new CustomersExportView(), 'customers.xlsx');
    }

    public function export_store()
    {
        Excel::store(new CustomersExport(), 'customers-' . now()->toDateString().'.xlsx');
        return 'OK';
    }

    public function export_format($format)
    {
       $extension = strtolower($format);

       if (in_array($format, ['Mpdf', 'Dompdf', 'Tcpdf'])) $extension = 'pdf';

       return Excel::download(new CustomersExport(), 'customers. ' . $extension, $format);
    }

    public function export_sheets()
    {
        return Excel::download(new CustomersExportSheets(), 'customer.xlsx');
    }

    public function export_heading()
    {
        return Excel::download(new CustomersExportHeading(), 'customers.xlsx');
    }

    public function export_styling()
    {
        return Excel::download(new CustomersExportStyling(), 'customers.xlsx');
    }

    public function export_autosize()
    {
        return Excel::download(new CustomersExportSize(), 'customers.xlsx');
    }

    public function import(Request $request)
    {
        Excel::import(new CustomersImport($request->delimiter), request()->file('import'), null, 'Xls'); // Csv

        return redirect()->route('customers.index')->withMessage('Imported');
    }

    public function import_large()
    {
     $time_start = $this->microtime_float();

     Excel::import(new CustomersImportLarge(), request()->file('import'));

     $time_end = $this->microtime_float();
     $time = $time_end - $time_start;

     return "Time: $time seconds";
    }

    public function import_relationships()
    {
        $time_start = $this->microtime_float();

        Excel::import(new CustomersImportRelationShips(), request()->file('import'));

        $time_end = $this->microtime_float();
        $time = $time_end - $time_start;

        return "Time: $time seconds";
    }

    public function export_dateformat()
    {
        return Excel::download(new CustomersExportDateFormat(), 'customers.xlsx');
    }

    public function import_dateformat()
    {
        Excel::import(new CustomersImportDateFormat(), request()->file('import'));

        return redirect()->route('customers.index')->withMessage('Imported');
    }



    private function microtime_float()
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }
}
