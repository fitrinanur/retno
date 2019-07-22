<?php
namespace App\Http\Imports;

use Illuminate\Support\Facades\Input;

class TransactionImports extends \Maatwebsite\Excel\Files\ExcelFile {

    protected $delimiter  = ',';
    protected $enclosure  = '"';
    protected $lineEnding = '\r\n';

    public function getFile()
    {
        $file = Input::file('import');
        return $file;
    }

    public function getFilters()
    {
        return [
            'chunk'
        ];
    }

}