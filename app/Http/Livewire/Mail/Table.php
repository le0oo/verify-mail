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
    public $datasearch;
    public $cissearch;

    public function render()
    {
        $this->datasearch = MailTable::where('estado', $this->verificado)
                            ->where('mail', 'ILIKE', "%{$this->emailsearch}%")
                            ->where('cis', 'LIKE', "{$this->cissearch}%")
                            ->get();

        if($this->verificado === null){
            return view('livewire.mail.table', [
                'listmail' => MailTable::where('mail', 'ILIKE', "%{$this->emailsearch}%")
                                ->where('cis', 'LIKE', "{$this->cissearch}%")
                                ->paginate(5)
            ]);
        }else{
            return view('livewire.mail.table', [
                'listmail' => MailTable::where('estado', $this->verificado)
                                ->where('mail', 'ILIKE', "%{$this->emailsearch}%")
                                ->where('cis', 'LIKE', "{$this->cissearch}%")
                                ->paginate(5)
            ]);
        }
    }


    public function mount()
    {
        $this->verificado=null;
        $this->emailsearch='';
    }

    public function limpiarfiltro(){
        $this->verificado=null;
        $this->emailsearch='';
        $this->resetPage();
    }

    public function exportexcel() 
    {
        $export = new MailsExport([$this->datasearch]);
        return Excel::download($export, 'mails.xlsx');
    }
    
    public function exportcsv() 
    {
        $export = new MailsExport([$this->datasearch]);
        return Excel::download($export, 'mails.csv');
    }
}