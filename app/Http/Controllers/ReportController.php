<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function stock()
    {
        $reports = DB::table('stocks')
                        ->leftJoin('stores','stocks.store_id','=','stores.id')
                        ->leftJoin('products','stocks.product_id','=','products.id')
                        ->select('stocks.*','products.name as product_name','stores.name as store_name')
                        ->paginate(150);

        return view('report.stock',[
            'dataset' => $reports
        ]);
    }

    public function stockPdf()
    {

        $reports = DB::table('stocks')
        ->leftJoin('stores','stocks.store_id','=','stores.id')
        ->leftJoin('products','stocks.product_id','=','products.id')
        ->select('stocks.*','products.name as product_name','stores.name as store_name')
        ->paginate(150);

        $pdf = \PDF::loadView('report.stock_pdf',[
            'dataset' => $reports
        ],[],[
            'mode'                 => 'utf-8',
            'format'               => 'A4-P',
            'default_font_size'    => '12',
            // 'default_font'         => 'FreeSerif',
            'margin_left'          => 5,
            'margin_right'         => 5,
            'margin_top'           => 5,
            'margin_bottom'        => 5,
            'margin_header'        => 0,
            'margin_footer'        => 10,
            'orientation'          => 'P',
            'title'                => 'Laravel mPDF',
            'author'               => '',
            'watermark'            => '',
            'show_watermark'       => false,
            'watermark_font'       => 'sans-serif',
            'display_mode'         => 'fullpage',
            'watermark_text_alpha' => 0.1,
            'custom_font_dir'      => '',
            'custom_font_data' 	   => [],
            'auto_language_detection'  => false,
            'temp_dir'               => base_path('storage/app/mpdf'),
            'pdfa' 			=> false,
            'pdfaauto' 		=> false,
        ]);

        
        return $pdf->stream('report.pdf');


    }
}