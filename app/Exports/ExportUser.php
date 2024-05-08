<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportUser implements FromView, WithStyles
{
    protected $request, $users;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function view(): View
    {
        $this->users = User::select('name', 'email')->limit(2)->get();
        return view('user')->with('users', $this->users);
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:B' . (count($this->users) + 1))
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle('thin');
    }
}
