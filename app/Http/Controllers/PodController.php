<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;

class PodController extends Controller
{
    public function index()
    {
        return view('pod');
        //return view('pdf02');
    }

    public function downloadPDF(){
        //$pdf = PDF::loadView('pdf');
        $pdf = PDF::loadView('pdf02');
        $filename = 'POD';
        return $pdf->stream($filename, '.pdf');
    }
}
