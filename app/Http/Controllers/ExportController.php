<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Jimmyjs\ReportGenerator\Facades\ExcelReportFacade;

class ExportController extends Controller
{
    public function excel()
    {
        $title = 'Registered User Report'; // Report title

        $meta = [ // For displaying filters description on header
            'Registered on' => 'All time',
            'Sort By' => 'Balance'
        ];

        $queryBuilder = User::select(['name', 'balance', 'created_at']) // Do some querying..
            ->orderBy('balance', 'desc');

        $columns = [ // Set Column to be displayed
            'Name' => 'name',
            'Email' => 'email',
            'Created At', // if no column_name specified, this will automatically seach for snake_case of column name (will be registered_at) column from query result
            'Total Balance' => 'balance',
            'Status' => function($result) { // You can do if statement or any action do you want inside this closure
                return ($result->balance > 100000) ? 'Rich Man' : 'Normal Guy';
            }
        ];

        // Generate Report with flexibility to manipulate column class even manipulate column value (using Carbon, etc).
        return ExcelReportFacade::of($title, $meta, $queryBuilder, $columns)
            ->editColumn('Created At', [ // Change column class or manipulate its data for displaying to report
                'displayAs' => function($result) {
                    return $result->created_at->format('d M Y');
                },
                'class' => 'left'
            ])
            ->editColumn('Total Balance', [
                'displayAs' => function($result) {
                    return number_format($result->balance, 2);
                },
                'class' => 'right bold'
            ])
            ->showTotal([ // Used to sum all value on specified column on the last table (except using groupBy method). 'point' is a type for displaying total with a thousand separator
                'Total Balance' => '$' // if you want to show dollar sign ($) then use 'Total Balance' => '$'
            ])
            ->download('users');
    }
}
