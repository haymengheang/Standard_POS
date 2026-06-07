<?php

namespace App\Imports;

use App\Models\Icproduct;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;


class ProductImport implements ToModel, WithHeadingRow,WithValidation,SkipsEmptyRows
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $row = $this->normalizeRow($row);

        return new Icproduct([
             'productid'        => $row['product_id'],
             'productname'      => $row['productname'],
             'productname2'     => $row['productname2'] ?? null,
             'price'            => $row['unit_price'],
             'other_price'      => $row['other_price'] ?? null,
             'unit_of_measure'  => $row['unit_of_measure'],
             'product_line'     => $row['product_line'],
             'useradd'          => Auth::User()->name,
        ]);
    }

    public function prepareForValidation($data, $index)
    {
        return $this->normalizeRow($data);
    }

    public function rules(): array
    {
        return [
            'product_id' => 'required|unique:icproduct,productid',
            'product_line' => 'required|exists:product_line,productlineid',
            'unit_of_measure' => 'required|exists:icum,umid',
            'productname' => 'required',
            'unit_price'  => 'required|numeric',
            'other_price' => 'nullable|numeric',
        ];
    }

    private function normalizeRow(array $row): array
    {
        $row['productname'] = $row['productname'] ?? $row['product_name'] ?? $row['description'] ?? null;
        $row['productname2'] = $row['productname2'] ?? $row['product_name2'] ?? $row['space_note'] ?? $row['specs_note'] ?? null;
        $row['unit_price'] = $row['unit_price'] ?? $row['price'] ?? null;
        $row['unit_of_measure'] = $row['unit_of_measure'] ?? $row['uom'] ?? null;

        return $row;
    }

    public function headingRow(): int
{
    return 3;
}

    public function customValidationMessages()
{
    return [

        'product_id.unique' =>
            'Product ID already exists.',

        'product_id.distinct' =>
            'Product ID is duplicated in the import file.',

        'product_line.exists' =>
            'Product Line not found.',

        'unit_of_measure.exists' =>
            'Unit Of Measure not found.',

    ];
}
}
