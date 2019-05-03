<?php

namespace App\Exports;
use DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PublisherExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        $data = DB::table('publishers')->select('*')->get()->toArray();
        $result = ['result' => $data];
        return view('admin.publisher.excel',$result);
    }
}
