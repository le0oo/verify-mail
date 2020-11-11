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
    public $taskduedate;
    public $deal;
    public $dateDesde, $dateHasta;

    public function render()
    {

        // dd(MailTable::select('id','mail','hash','estado','updated_at')
        //                         ->where('mail', 'LIKE', "%{$this->emailsearch}%")
        //                         // ->where('cis', 'LIKE', "{$this->cissearch}%")
        //                         ->get());

        if($this->verificado == null){
            return view('livewire.mail.table', [

                'listmail' => MailTable::select('id','mail','cis','hash','estado','created_at','updated_at')
                                ->where('mail', 'LIKE', '%'.$this->emailsearch.'%')
                                ->where('cis', 'like', '%'.$this->cissearch.'%')
                                ->paginate(5),
                'listcis'   => CisTable::all()
            ]);
        }else        
        {
            return view('livewire.mail.table', [
                'listmail' => MailTable::select('id','cis','mail','hash','estado','created_at','updated_at')
                                ->where('mail', 'LIKE', '%'.$this->emailsearch.'%')
                                ->where('cis', 'like', '%'.$this->cissearch.'%')
                                ->where('estado','=' , $this->verificado)
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
        // $this->dateDesde->resetPage();
        $this->resetPage();
    }

    public function export($select) 
    {
        switch($select){
            case "excel":
                if($this->verificado === null)
                    {
                        $export = new MailsExport([MailTable::select('id','cis','mail','hash','estado','created_at','updated_at')
                                                ->where('mail', 'LIKE', "%{$this->emailsearch}%")
                                                ->where('cis', 'LIKE', "{$this->cissearch}%")
                                                ->get()]);
                    }
                else
                    {
                        $export = new MailsExport([MailTable::select('id','cis','mail','hash','estado','created_at','updated_at')
                                                ->where('mail', 'LIKE', "%{$this->emailsearch}%")
                                                ->where('cis', 'LIKE', "{$this->cissearch}%")
                                                ->where('estado','=' , $this->verificado)
                                                ->get()]);

                    }

                return Excel::download($export, 'mails.xlsx');
                break;
            case "csv":
                if($this->verificado === null)
                {
                    $export = new MailsExport([MailTable::select('id','cis','mail','hash','estado','created_at','updated_at')
                                            ->where('mail', 'LIKE', "%{$this->emailsearch}%")
                                            ->where('cis', 'LIKE', "{$this->cissearch}%")
                                            ->get()]);
                }
                else
                {
                    $export = new MailsExport([MailTable::select('id','cis','mail','hash','estado','created_at','updated_at')
                                            ->where('mail', 'LIKE', "%{$this->emailsearch}%")
                                            ->where('cis', 'LIKE', "{$this->cissearch}%")
                                            ->where('estado','=' , $this->verificado)
                                            ->get()]);
    
                }
                return Excel::download($export, 'mails.csv');
                break;
        }

    }

    public function addTask()
    {
        $this->deal->tasks()->create([
            'tasktext' => $this->tasktext,
            'taskduedate' => $this->taskduedate,
        ]);
    }
}