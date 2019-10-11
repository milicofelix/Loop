<?php

namespace Loop;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Client extends Model implements TableInterface
{
    protected $fillable = [
                            'name','phone','birthday_date','cep','address',
                            'address_number','neighborhood','localization','uf'];

    /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return [
            'ID','Nome','Telefone','Nascimento','Cep','Endereço','Número','Bairro','Estado','UF'
        ];
    }

    /**
     * Get the value for a given header. Note that this will be the value
     * passed to any callback functions that are being used.
     *
     * @param string $header
     * @return mixed
     */
    public function getValueForHeader($header)
    {
        switch ($header){
            case 'ID':
                return $this->id;
            case 'Nome':
                return $this->name;
            case 'Telefone':
                return $this->mask($this->phone,'(##)####-####');
            case 'Nascimento':
                return date('d/m/Y', strtotime($this->birthday_date));
            case 'Cep':
                return $this->mask($this->cep,'#####-###');
            case 'Endereço':
                return $this->address;
            case 'Número':
                return $this->address_number;
            case 'Bairro':
                return $this->neighborhood;
            case 'Estado':
                return $this->localization;
            case 'UF':
                return $this->uf;

        }
    }

    private function mask($val, $mask)
    {
        $maskared = '';
        $k = 0;
        $val = explode('-',$val);
        $val = implode('',$val);
        for($i = 0; $i<=strlen($mask)-1; $i++)
        {
            if($mask[$i] == '#')
            {
                if(isset($val[$k]))
                    $maskared .= $val[$k++];
            }
            else
            {
                if(isset($mask[$i]))
                    $maskared .= $mask[$i];
            }
        }
        return $maskared;
    }
}
