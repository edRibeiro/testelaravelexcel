<?php

namespace App\Imports;

use App\Cliente;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;


class ClienteImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnError, SkipsOnFailure
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    use SkipsFailures, SkipsErrors;
    private $rows = 0;
    public function model(array $row)
    {   
        //dd(date($row['data_nascimento']));
        ++$this->rows;
        return new Cliente([            
            'nome' => $row['nome'], 
            'sobrenome' => $row['sobrenome'], 
            'data_nascimento' => $row['data_nascimento'], 
            'cpf' => $row['cpf'], 
            'celular' => $row['celular'], 
            'email' => $row['email'],
        ]);
    }

    public function getRowCount(): int
    {
        return $this->rows;
    }

    public function rules(): array
    {
        return [ ];
    }

    /**
 * @return array
 */
    public function customValidationMessages()
    {
        return [
            'cpf' => 'Custom message for :attribute.',
        ];
    }

    public function customValidationAttributes()
    {
        return ['cpf' => 'unique'];
    }

    
}
