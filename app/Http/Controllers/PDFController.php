<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
 
use PDF;
   
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'INSTALAR',
            'date' => date('m/d/Y')
        ];
           
        $pdf = PDF::loadView('testPDF', $data);
     
        return $pdf->download('tutsmake.pdf');
    }
}