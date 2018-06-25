<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use DB;
use Khill\Lavacharts\Lavacharts;
use Illuminate\Support\Facades\Redis;


class ModbusController extends Controller
{

    public function trends() {
        $search = \Request::get('search');
        $rec_search = DB::table('modbus')
            ->select('reg_date as date','reg_value as value')
            ->where('reg_comment','like','%'.$search.'%')
            ->get()
            ->all();

        $chartjs = app()->chartjs
            ->name($search)
            ->type('line')
            ->size(['width' => 400, 'height' => 200])
            ->labels(array_pluck($rec_search,'date'))
            ->datasets([
                [
                    "label" => $search,
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => array_pluck($rec_search,'value'),
                ],

            ])
            ->options([]);



        $unique = DB::table('modbus')->distinct()->pluck('reg_comment');

        $rec = collect();
        foreach ($unique as $title) {
            $rec -> push(DB::table('modbus')
                ->select('reg_date as date','reg_value as value')
                ->where('reg_comment' , $title)
                ->get()
                ->all());
        }

        $chart_coll = collect();
        $index=0;
        foreach ($rec as $item) {
            $chart = app()->chartjs
                ->name($unique[$index])
                ->type('line')
                ->size(['width' => 400, 'height' => 200])
                ->labels(array_pluck($item,'date'))
                ->datasets([
                    [
                        "label" => $unique[$index],
                        'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                        'borderColor' => "rgba(38, 185, 154, 0.7)",
                        "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                        "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                        "pointHoverBackgroundColor" => "#fff",
                        "pointHoverBorderColor" => "rgba(220,220,220,1)",
                        'data' => array_pluck($item,'value'),
                    ],

                ])
                ->options([]);

            $chart_coll->push($chart);
            $chart = null;
            $index++;
        }

        return view('modbus.trends')->with('chart_coll',$chart_coll)->with('chartjs',$chartjs)->with('unique',$unique);
    }
    public function logs(){
        $title = 'Logi';
        //$data = DB::table('modbus')->paginate(20);
        //return view('pages.index', compact('title'));
        $search = \Request::get('search'); //<-- we use global request to get the param of URI

        $data = DB::table('modbus')->where('reg_comment','like','%'.$search.'%')
            ->orderBy('reg_date','desc')
            ->paginate(20);

        $unique = DB::table('modbus')->distinct()->pluck('reg_comment');




        return view('modbus.index') -> with('title', $title)->with('data',$data)->with('unique',$unique);
    }


    public function redisLog($filtr) {
        $tags = Redis::command('keys', ['*'.$filtr.'*']);
        $values = collect();
        foreach ($tags as $tag) {

            array_add($values,$tag,Redis::command('get', [$tag]));
        }


        return view('modbus.proces') ->with('values',$values)->with('tags',$tags);
    }


}
