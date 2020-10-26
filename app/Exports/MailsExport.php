<?php

namespace App\Exports;

use App\Models\MailTable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class MailsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    public function collection()
    {
        return MailTable::all();
    }
}
