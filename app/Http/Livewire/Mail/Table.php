<?php

namespace App\Http\Livewire\Mail;
use App\Models\MailTable;
use App\Models\CisTable;
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

        // dd(MailTable::select('id','mail','hash','estado','updated_at')
        //                         ->where('mail', 'LIKE', "%{$this->emailsearch}%")
        //                         // ->where('cis', 'LIKE', "{$this->cissearch}%")
        //                         ->get());

        if($this->verificado === null && $this->cissearch === ''){

            return view('livewire.mail.table', [
                'listmail' => MailTable::select('id','mail','cis','hash','estado','updated_at')
                                ->where('mail', 'LIKE', "%{$this->emailsearch}%")
                                ->paginate(5),
                'listcis'   => CisTable::all()
            ]);
        }elseif($this->verificado === null && $this->cissearch ==! null)
        {
            return view('livewire.mail.table', [
                'listmail' => MailTable::select('id','mail','cis','hash','estado','updated_at')
                                ->where('mail', 'LIKE', "%{$this->emailsearch}%")
                                ->where('cis', 'LIKE', "{$this->cissearch}%")
                                ->paginate(5),
                'listcis'   => CisTable::all()
            ]);

        }else        
        {
            return view('livewire.mail.table', [
                'listmail' => MailTable::select('id','cis','mail','hash','estado','updated_at')
                                ->where('estado', $this->verificado)
                                ->where('mail', 'LIKE', "%{$this->emailsearch}%")
                                ->where('cis', 'LIKE', "{$this->cissearch}%")
                                ->paginate(5),
                'listcis'   => CisTable::all()
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
                                                ->where('mail', 'LIKE', "%{$this->emailsearch}%")
                                                ->where('cis', 'LIKE', "{$this->cissearch}%")
                                                ->get()]);
                    }
                else
                    {
                        $export = new MailsExport([MailTable::select('id','cis','mail','hash','estado','updated_at')
                                                ->where('estado', $this->verificado)
                                                ->where('mail', 'LIKE', "%{$this->emailsearch}%")
                                                ->where('cis', 'LIKE', "{$this->cissearch}%")
                                                ->get()]);

                    }

                return Excel::download($export, 'mails.xlsx');
                break;
            case "csv":
                if($this->verificado === null)
                {
                    $export = new MailsExport([MailTable::select('id','cis','mail','hash','estado','updated_at')
                                            ->where('mail', 'LIKE', "%{$this->emailsearch}%")
                                            ->where('cis', 'LIKE', "{$this->cissearch}%")
                                            ->get()]);
                }
                else
                {
                    $export = new MailsExport([MailTable::select('id','cis','mail','hash','estado','updated_at')
                                            ->where('estado', $this->verificado)
                                            ->where('mail', 'LIKE', "%{$this->emailsearch}%")
                                            ->where('cis', 'LIKE', "{$this->cissearch}%")
                                            ->get()]);
    
                }
                return Excel::download($export, 'mails.csv');
                break;
        }

    }
}