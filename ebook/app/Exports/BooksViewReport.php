<?php

namespace App\Exports;

use App\book;
use DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BooksViewReport implements FromView
{
    /**
    * @return \Illuminate\Support\View
    */
    public function view():View
    {
    	$data = DB::table('books')
                    ->join('kinds','books.kind_id','=','kinds.id')
                    ->join('publishers','books.publisher_id','=','publishers.id')
                    ->join('authors','books.author_id','=','authors.id')
                    ->select('books.*','kinds.name as kind','publishers.name as publisher','authors.name as author')
                    ->get()->toArray();

        $result = ['result' => $data];
        return view('admin.book.excel',$result);
    }
}
