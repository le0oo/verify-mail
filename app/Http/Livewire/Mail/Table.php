<?php

namespace App\Http\Livewire\Mail;
use App\Models\MailTable;
use Livewire\WithPagination;

use App\Exports\MailsExport;
use Maatwebsite\Excel\Facades\Excel;


use Livewire\Component;

class Table extends Component
{
    use WithPagination;
    public $verificado;
    public $emailsearch;

    public function render()
    {
        return view('livewire.mail.table', [
            'listmail' => MailTable::where('estado', $this->verificado)
                            ->where('mail', 'ILIKE', "%{$this->emailsearch}%")
                            ->paginate(5)
        ]);
    }
    public function mount()
    {
        $this->verificado=null;
        $this->emailsearch='';
    }

    public function export() 
    {
        return Excel::download(new MailsExport, 'mails.xlsx');
    }
}
