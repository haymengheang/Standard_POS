<?php

namespace App\Exports;

use App\Models\Icproduct;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Icproduct::select(
            'productid',
            'productname',
            'productname2',
            'price',
            'other_price',
            'unit_of_measure',
            'product_line',
            'created_at',
            'useradd'
        )->get();
    }

    public function headings(): array
    {
        return [
            'Product ID',
            'Description',
            'Space / Note',
            'Unit Price',
            'Other Price',
            'UOM',
            'Product Line',
            'Create add',
            'User'
        ];
    }
}
