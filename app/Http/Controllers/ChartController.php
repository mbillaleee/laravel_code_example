<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;

class ChartController extends Controller
{
    public function index()
    {
    	$users = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')->whereYear('created_at', date('Y'))->groupBy('month')->orderBy('month')->get();
    	$labels = [];
    	$data = [];
    	$colors = ['#ff6384', '#36A2EB', 'FFCF56', '#8BC34A', 'FF5722', '#009688', '#795548', '9C27B0', '#2196F3', 'FF9800', '#CDDC93', '#607D8B'];

    	for ($i=1; $i < 12; $i++) { 
    		$month = date('F', mktime(0,0,0,$i,1));
    		$count = 0;

    		
	    foreach ($users as $user) {
	        if ($user->month == $i) {
	            $count = $user->count;
	            break;
	        }
	    }
    		array_push($labels, $month);
    		array_push($data, $count);
    	}
    	$datasets = [
    		[
    			'label' => 'Users',
    			'data'  => $data,
    			'backgroundColor'=> $colors
    		]
    	];
    	return view('chart.chart', compact('datasets', 'labels'));
    }

    public function HighChart()
    {
    	$userData = User::select(DB::raw("COUNT(*) as count"))
    					->whereYear("created_at", date('Y'))
    					->groupBy(DB::raw("Month(created_at)"))
    					->pluck('count');

    	// dd($userData);
    	return view('chart.high_chart', compact('userData'));
    }

    public function pieChart()
    {
    	// $data['pieChart'] = User::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
     //        ->whereYear('created_at', date('Y'))
     //        ->groupBy('month_name')
     //        ->orderBy('count')
     //        ->get();

        $data['pieChart'] = User::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
		    ->whereYear('created_at', date('Y'))
		    ->groupBy('month_name')
		    ->orderBy('count')
		    ->get();

        return view('chart.pie-chart', $data);
    }
}
