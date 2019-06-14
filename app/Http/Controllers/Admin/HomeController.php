<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Package;
use Charts;
use DB;

class HomeController extends Controller
{
    public function getIndex(Request $request) {
    	$packages = Package::all();
    	$pack1 = DB::table('packages')->select('packages.views')->where('pack_id', 1)->first()->views;
    	$pack2 = DB::table('packages')->select('packages.views')->where('pack_id', 2)->first()->views;
    	$pack3 = DB::table('packages')->select('packages.views')->where('pack_id', 3)->first()->views;
    	$pack4 = DB::table('packages')->select('packages.views')->where('pack_id', 4)->first()->views;
    	$pack5 = DB::table('packages')->select('packages.views')->where('pack_id', 5)->first()->views;
    	$pack6 = DB::table('packages')->select('packages.views')->where('pack_id', 6)->first()->views;

    	$egy = DB::table('visits')->select('visits.id')->where('country','=', 'EG')->count();
    	$sa = DB::table('visits')->select('visits.id')->where('country','=', 'SA')->count();
    	$uae = DB::table('visits')->select('visits.id')->where('country','=', 'UAE')->count();
    	
        $p1 = DB::table('packages')->select('packages.pack_name_en')->where('pack_id', 1)->first()->pack_name_en;
        $p2 = DB::table('packages')->select('packages.pack_name_en')->where('pack_id', 2)->first()->pack_name_en;
        $p3 = DB::table('packages')->select('packages.pack_name_en')->where('pack_id', 3)->first()->pack_name_en;
        $p4 = DB::table('packages')->select('packages.pack_name_en')->where('pack_id', 4)->first()->pack_name_en;
        $p5 = DB::table('packages')->select('packages.pack_name_en')->where('pack_id', 5)->first()->pack_name_en;
        $p6 = DB::table('packages')->select('packages.pack_name_en')->where('pack_id', 6)->first()->pack_name_en;
        
    	$chart = Charts::database($packages, 'bar', 'highcharts')
    			 ->title("Package Details")
    			 ->elementLabel("Total Packages")
    			 ->dimensions(1000, 500)
    			 ->responsive(true)
    			 ->groupBy('views')
    			 ->labels(['package 1','package 2','package3','package 4','package 5','package 6','package 7','package 8','package 9']);
    	
    	$pie_chart = Charts::create('pie', 'highcharts')
    			 ->title("Package Views")
    			 ->labels(['package 1','package 2','package 3','package 4','package 5','package 6'])
    			 ->values([$pack1,$pack2,$pack3, $pack4,$pack5,$pack6])
    			 ->dimensions(1000, 500)
    			 ->responsive(true);
    	$line_chart = Charts::create('line', 'highcharts')
    			 ->title("Package Views")
    			 ->elementLabel("Chart Lables")
    			 ->labels(['package 1','package 2','package3','package 4','package 5','package 6'])
    			 ->values([$pack1,$pack2,$pack3, $pack4,$pack5,$pack6])
    			 ->dimensions(1000, 500)
    			 ->responsive(true);
    	$areaspline_chart = Charts::multi('areaspline', 'highcharts')
    			 ->title("Areaspline Chart Demo")
    			 ->colors(['#ff0000', '#ffffff'])
    			 ->labels(['Jan','Feb','Mar','Abl','May','Jun'])
    			 ->dataset('Product 1',[10,15,20,25,30,35])
    			 ->dataset('Product 2',[14,19,26,32,40,50]);
    	$percentage_chart1 = Charts::realtime(route('chartdata'),5000,'percentage', 'justgage')
    			 ->title("Chrome")
    			 ->elementLabel("%")
    			 ->responsive(true)
    			 ->height(300)
    			 ->width(0);
    	$percentage_chart2 = Charts::realtime(route('chartdata'),5000,'percentage', 'justgage')
    			 ->title("Mozilla")
    			 ->elementLabel("%")
    			 ->responsive(true)
    			 ->height(300)
    			 ->width(0);
    	$percentage_chart3 = Charts::realtime(route('chartdata'),5000,'percentage', 'justgage')
    			 ->title("Safari")
    			 ->elementLabel("%")
    			 ->responsive(true)
    			 ->height(300)
    			 ->width(0);
    	$percentage_chart4 = Charts::realtime(route('chartdata'),5000,'percentage', 'justgage')
    			 ->title("Opera")
    			 ->elementLabel("%")
    			 ->responsive(true)
    			 ->height(300)
    			 ->width(0);
    	$pie_chart2 = Charts::create('pie', 'highcharts')
    			 ->title("Country Visits")
    			 ->labels(['Egypt','Saudia','UAE'])
    			 ->values([$egy,$sa,$uae])
    			 ->dimensions(1000, 500)
    			 ->responsive(true);
    	$geo_chart = Charts::create('geo', 'highcharts')
    			 ->title("Country Visits")
    			 ->elementLabel("Visits")
    			 ->labels(['SA','EGY','UAE'])
    			 ->colors(['#C5CAE9', '#283593'])
    			 ->values([125,155,170,190])
    			 ->dimensions(1000, 500)
    			 ->responsive(true);
    	$area_chart = Charts::create('area', 'highcharts')
    			 ->title("Area Chart Demo")
    			 ->elementLabel("Chart Lables")
    			 ->labels(['First','Second','Third'])
    			 ->values([28,52,64,86,99])
    			 ->dimensions(1000, 500)
    			 ->responsive(true);
    	$donut_chart = Charts::create('donut', 'highcharts')
    			 ->title("Package Views")
    			 ->elementLabel("Chart Lables")
    			 ->labels(['package 1','package 2','package3','package 4','package 5','package 6'])
    			 ->values([$pack1,$pack2,$pack3, $pack4,$pack5,$pack6])
    			 ->dimensions(1000, 500)
    			 ->responsive(true);
        return view('admin.pages.home', compact('chart','pie_chart','line_chart','areaspline_chart','percentage_chart1','percentage_chart2','percentage_chart3','percentage_chart4','pie_chart2','area_chart','donut_chart','pack1'));
    }

}
