<?php

namespace Upanel\Http\Controllers;

use Illuminate\Http\Request;
use Upanel\Person;
use Upanel\Http\Requests\ClientStoreRequest;
use Upanel\Http\Requests\ClientUpdateRequest;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Person::withTrashed()->get();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(ClientStoreRequest $request)
    {
        $client = Person::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'type_doc' => $request->type_doc,
            'num_doc' => $request->num_doc,
            'address' => $request->address,
            'telephone' => $request->telephone,
            'email' => $request->email,
        ]);
        return redirect()->back()->with('success', "El cliente $client->name se ha registrado con éxito.");

    }

    public function edit($client)
    {
        $client = Person::withTrashed()->whereId($client)->first();
        return view('clients.edit', compact('client'));

    }

    public function update(ClientUpdateRequest $request, $client)
    {
        $client = Person::withTrashed()->whereId($client)->first();


        $client->name = $request->name;
        $client->type_doc = $request->type_doc;
        $client->num_doc = $request->num_doc;
        $client->address = $request->address;
        $client->telephone = $request->telephone;
        $client->email = $request->email;
        $client->save();

        return redirect()->back()->with('success', "El cliente $client->name se ha actualizado con éxito.");
    }

    public function deactive($client)
    {
        $client = Person::withTrashed()->whereId($client)->first();
        $client->delete();

        return redirect()->back()->with('success', "El cliente $client->name se ha desactivado con éxito.");

    }

    public function active($client)
    {
        $client = Person::withTrashed()->whereId($client)->first();
        $client->restore();
        return redirect()->back()->with('success', "El cliente $client->name se ha activado con éxito.");
    }
}
