<?php

namespace Loop\Http\Controllers;

use Loop\Client;
use Loop\Forms\Clients;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients =  Client::orderBy('id','desc')->paginate(5);
        $text =  "Sistema de cadastro de Clientes - Utilizando API VIACEP";
        return view('clients.index',compact('text','clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = \FormBuilder::create(Clients::class,[
                    'url' => route('clients.store'),
                    'method' => 'POST'
                ]);
        return view('clients.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = \FormBuilder::create(Clients::class);

        if(!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data =  $form->getFieldValues();

        Client::create($data);

        $request->session()->flash('message','Cliente cadastrado com sucesso!');

        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('clients.show',compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $form = \FormBuilder::create(Clients::class,[
            'url' => route('clients.update',['client' => $client->id]),
            'method' => 'PUT',
            'model' => $client
        ]);
        return view('clients.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Client $client)
    {
        $form = \FormBuilder::create(Clients::class);

        if(!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data =  $form->getFieldValues();

        $client->update($data);

        session()->flash('message','Cliente atualizado com sucesso!');

        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        session()->flash('message','Cliente excluído com sucesso!');

        return redirect()->route('clients.index');
    }
}
