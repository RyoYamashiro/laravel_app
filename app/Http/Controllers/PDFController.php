<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function index()
    {
        $pdf = PDF::loadView('pdf.hello');

        return $pdf->stream('hello.pdf');
    }
}
