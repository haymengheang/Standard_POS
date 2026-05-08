<?php

namespace App\Imports;

use App\Models\Icproduct;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Icproduct([
            'productid'        => $row['productid'],
            'productname'      => $row['productname'],
            'productname2'     => $row['productname2'],
            'unitprice'        => $row['unit_price'],
            'other_price'      => $row['other_price'],
            'unit_of_measure'  => $row['unit_of_measure'],
            'product_line'     => $row['product_line'],
        ]);
    }
}
