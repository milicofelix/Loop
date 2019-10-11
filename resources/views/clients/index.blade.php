<?php
/**
 * Created by PhpStorm.
 * User: Adriano
 * Date: 09/10/19
 * Time: 22:59
 */
?>

@extends('layouts.app')
    @section('content')
        <div>
            <h3>{{$text}}</h3>
            {!! Button::primary('Novo Cliente')->asLinkTo(route('clients.create')) !!}
            <br><br>
            {!! Table::withContents($clients->items())
                ->striped()
                ->callback('Ação', function ($fields, $model){
                    $linkShow = route('clients.show',['client' => $model->id]);
                    return Button::warning('Detalhes')->asLinkTo($linkShow);
                })
             !!}

            {!! $clients->links() !!}
        </div>
    @endsection