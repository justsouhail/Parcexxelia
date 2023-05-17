<?php

namespace App\Exports;

use App\Models\Ordinateur;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Invoice;

class OrdinateurExport implements FromView
{
    protected $ordinateurs;

    public function __construct($ordinateurs)
    {
        $this->ordinateurs = $ordinateurs;
    }

    public function view(): View
    {
        return view('export.excel', [
            'ordinateur' => $this->ordinateurs
        ]);
    }
}
