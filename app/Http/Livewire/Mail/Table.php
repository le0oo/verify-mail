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

        if($this->verificado === null){


            
            return view('livewire.mail.table', [
                'listmail' => MailTable::select('id','cis','mail','hash','estado','updated_at')
                                ->where('mail', 'ILIKE', "%{$this->emailsearch}%")
                                ->where('cis', 'LIKE', "{$this->cissearch}%")
                                ->paginate(5)
            ]);
        }else{


            return view('livewire.mail.table', [
                'listmail' => MailTable::select('id','cis','mail','hash','estado','updated_at')
                                ->where('estado', $this->verificado)
                                ->where('mail', 'ILIKE', "%{$this->emailsearch}%")
                                ->where('cis', 'LIKE', "{$this->cissearch}%")
                                ->paginate(5)
            ]);
        }
    }


    public function mount()
    {
        $this->limpiarfiltro();
    }

    public function limpiarfiltro(){
        $this->verificado=null;
        $this->emailsearch='';
        $this->cissearch='';
        $this->resetPage();
    }

    public function export($select) 
    {
        switch($select){
            case "excel":
                if($this->verificado === null)
                    {
                        $export = new MailsExport([MailTable::select('id','cis','mail','hash','estado','updated_at')
                                                ->where('mail', 'ILIKE', "%{$this->emailsearch}%")
                                                ->where('cis', 'LIKE', "{$this->cissearch}%")
                                                ->get()]);
                    }
                else
                    {
                        $export = new MailsExport([MailTable::select('id','cis','mail','hash','estado','updated_at')
                                                ->where('estado', $this->verificado)
                                                ->where('mail', 'ILIKE', "%{$this->emailsearch}%")
                                                ->where('cis', 'LIKE', "{$this->cissearch}%")
                                                ->get()]);

                    }

                return Excel::download($export, 'mails.xlsx');
                break;
            case "csv":
                if($this->verificado === null)
                {
                    $export = new MailsExport([MailTable::select('id','cis','mail','hash','estado','updated_at')
                                            ->where('mail', 'ILIKE', "%{$this->emailsearch}%")
                                            ->where('cis', 'LIKE', "{$this->cissearch}%")
                                            ->get()]);
                }
                else
                {
                    $export = new MailsExport([MailTable::select('id','cis','mail','hash','estado','updated_at')
                                            ->where('estado', $this->verificado)
                                            ->where('mail', 'ILIKE', "%{$this->emailsearch}%")
                                            ->where('cis', 'LIKE', "{$this->cissearch}%")
                                            ->get()]);
    
                }
                return Excel::download($export, 'mails.csv');
                break;
        }

    }
}