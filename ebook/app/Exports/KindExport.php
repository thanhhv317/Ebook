<?php

namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;

class KindExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        $data = DB::table('kinds')->select('*')->get()->toArray();
        $result = ['result' => $data];
        return view('admin.kind.excel',$result);
    }
}
