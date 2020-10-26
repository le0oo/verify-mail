<?php

namespace App\Exports;

use App\Models\MailTable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;

class MailsExport implements FromArray
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    protected $data;

    // public function collection()
    // {
    //     return MailTable::all();
    // }

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function array(): array
    {
        return $this->data;
    }

}
