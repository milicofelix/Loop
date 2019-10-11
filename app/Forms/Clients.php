<?php

namespace Loop\Forms;

use Kris\LaravelFormBuilder\Form;

class Clients extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text',['label'=> 'Nome', 'rules'=> 'required|max:255'])
            ->add('phone', 'text',['label'=> 'Telefône', 'rules'=> 'required|max:15'])
            ->add('birthday_date', 'date',['label'=> 'Data de Nascimento','rules'=> 'required' ])
            ->add('cep', 'text',['rules'=> 'required|max:9'])
            ->add('address', 'text',['label'=> 'Logradouro','rules'=> 'required|max:255'])
            ->add('address_number','text',['label'=> 'Número','rules'=> 'required'])
            ->add('neighborhood','text',['label' => 'Bairro','rules'=> 'required|max:255'])
            ->add('localization','text',['label'=> 'Localidade','rules'=> 'required'])
            ->add('uf','text',['rules'=> 'required|max:2']);
    }
}
