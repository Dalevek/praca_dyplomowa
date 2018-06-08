<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ModbusController extends Controller
{
    public function trends(){
        $title = 'Wykresy';
        //$data = DB::table('modbus')->paginate(20);
        //return view('pages.index', compact('title'));
        $search = \Request::get('search'); //<-- we use global request to get the param of URI

        $data = DB::table('modbus')->where('reg_comment','like','%'.$search.'%')
            ->orderBy('reg_date','desc')
            ->paginate(20);

        $unique = DB::table('modbus')->distinct()->pluck('reg_comment');




        return view('modbus.trends') -> with('title', $title)->with('data',$data)->with('unique',$unique);
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


}
