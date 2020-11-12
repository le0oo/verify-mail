<?php

namespace App\Http\Livewire\Mail;
use DateTime;
use Carbon\Carbon;
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
    public $dateDesde, $dateHasta;

    public function render()
    {
        // $this->dateDesde = Carbon::setDate($this->dateDesde)->setTime(00, 00, 00);

        if($this->dateDesde == null){
            $this->dateDesde = Carbon::now()->subYears(4);
        }elseif($this->dateHasta == null){
            $this->dateHasta = Carbon::now();
        }

        if($this->verificado == null){
            return view('livewire.mail.table', [

                'listmail' => MailTable::select('id','mail','cis','hash','estado','created_at','updated_at')
                                ->where('mail', 'LIKE', '%'.$this->emailsearch.'%')
                                ->where('cis', 'like', '%'.$this->cissearch.'%')
                                ->whereDate('updated_at','>=', new DateTime($this->dateDesde))
                                ->whereDate('updated_at','<=', new DateTime($this->dateHasta))
                                ->paginate(5),
                'listcis'   => CisTable::all()
            ]);
        }else        
        {
            return view('livewire.mail.table', [
                'listmail' => MailTable::select('id','cis','mail','hash','estado','created_at','updated_at')
                                ->where('mail', 'LIKE', '%'.$this->emailsearch.'%')
                                ->where('cis', 'like', '%'.$this->cissearch.'%')
                                ->whereDate('updated_at','>=', new DateTime($this->dateDesde))
                                ->whereDate('updated_at','<=', new DateTime($this->dateHasta))
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
        $this->dateDesde=null;
        $this->dateHasta=null;
        // dd($this->dateDesde, $this->dateHasta);
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
}