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
    public function index(Request $request)
    {
        $id = $request->input('id');

        $data = [
            'title' => 'INSTALAR',
            'date' => date('m/d/Y'),
            'id' => $id
        ];
           
        $pdf = PDF::loadView('testPDF', $data);
     
        return $pdf->download('tutsmake.pdf');
    }
}