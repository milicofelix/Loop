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
        <h3>Edição de Clientes</h3>

            {!! form($form->add('insert','submit',[
            'attr'=> ['class'=> 'btn btn-primary btn-block'],
            'label' => 'Editar'
            ])) !!}

    </div>
@endsection