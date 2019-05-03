<?php

namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\author;
use DB;

class AuthorExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
    	$data = DB::table('authors')->select('*')->get()->toArray();
        $result = ['result' => $data];
        return view('admin.author.excel',$result);
    }
}
