<?php
/**
 * Created by PhpStorm.
 * User: Adriano
 * Date: 09/10/19
 * Time: 15:03
 */
?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Cliente</h3>

        @php

        $linkEdit = route('clients.edit',['client' => $client->id]);
        $linkDestroy = route('clients.destroy',['client' => $client->id]);
        $linkList = route('clients.index');
        @endphp

        {!! Button::primary('Editar')->asLinkTo($linkEdit) !!}
        {!!
            Button::danger('Excluir')->asLinkTo($linkDestroy)
            ->addAttributes([
                'onclick' => "event.preventDefault();document.getElementById(\"form_delete\").submit()"
            ])
        !!}
        {!! Button::info('Voltar')->asLinkTo($linkList) !!}

        @php

            $formDelete = FormBuilder::plain([

                            'id' => 'form_delete',
                            'url' => $linkDestroy,
                            'method' => 'DELETE',
                            'style' => 'display:none'
                            ]);

        @endphp
{!! form($formDelete) !!}
        <br /><br />
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th scope="row">ID</th>
                <td>{{$client->id}}</td>

            </tr>
            <tr>
                <th scope="row">Nome</th>
                <td>{{$client->name}}</td>

            </tr>
            <tr>
                <th scope="row">Data Nascimento</th>
                <td>{{$client->birthday_date}}</td>

            </tr>
            <tr>
                <th scope="row">Cep</th>
                <td>{{$client->cep}}</td>

            </tr>
            <tr>
                <th scope="row">Endereço</th>
                <td>{{$client->address}}</td>

            </tr>
            <tr>
                <th scope="row">Número</th>
                <td>{{$client->address_number}}</td>

            </tr>
            <tr>
                <th scope="row">Bairro</th>
                <td>{{$client->neighborhood}}</td>

            </tr>
            <tr>
                <th scope="row">Estado</th>
                <td>{{$client->localization}}</td>

            </tr>
            <tr>
                <th scope="row">UF</th>
                <td>{{$client->uf}}</td>

            </tr>

            </tbody>
        </table>

    </div>

@endsection