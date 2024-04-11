<?php

namespace App\Imports;

use App\Models\MasterDate;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportMaster implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MasterDate([
            'coupon_no'     => $row[0],
            'product'    => $row[1],
            'lot_no'    => $row[2],
           
        ]);
    }
}
