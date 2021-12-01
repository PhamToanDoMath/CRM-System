<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\CustomersExport;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function export(){
        return Excel::download(new CustomersExport,'export.xlsx');
    }

}
