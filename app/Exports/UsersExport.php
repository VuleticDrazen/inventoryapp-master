<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{

    private $request;

    /**
     * UsersExport constructor.
     * @param $request
     */
    public function __construct(Request $request = null)
    {
        $this->request = $request;
    }

    public function collection()
    {
        return collect(User::getUsers($this->request));
    }
}
