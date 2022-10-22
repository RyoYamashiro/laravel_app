<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function index()
    {
        $data = 'おはようさん';
        $pdf = PDF::loadView('pdf.hello', compact('data'));

        return $pdf->stream('hello.pdf');
    }
}
