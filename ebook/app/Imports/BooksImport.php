<?php

namespace App\Imports;

use App\book;
use Maatwebsite\Excel\Concerns\ToModel;

class BooksImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new book([
            'name' => $row[0],
            'alias' => str_slug($row[0]),
            'publisher_id' => $row[1],
            'kind_id' => $row[2],
            'author_id' => $row[3],
            'price' => $row[4],
            'quantity' => $row[5],
            'description' => $row[6],
            'image' => 'none.jpg',
        ]);
    }
}
