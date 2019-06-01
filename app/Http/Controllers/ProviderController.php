<?php

namespace Upanel\Http\Controllers;

use Illuminate\Http\Request;
use Upanel\Person;
use Upanel\Provider;

class ProviderController extends Controller
{
    public function index()
    {
        $providers = Provider::withTrashed()->get();
        return view('providers.index', compact('providers'));
    }

    public function create()
    {
        return view('providers.create');
    }

    public function store(Request $request)
    {
        $person = Person::create([
            'name' => $request->name,
            'lastname' => 'NA',
            'type_doc' => $request->type_doc,
            'num_doc' => $request->num_doc,
            'address' => $request->address,
            'telephone' => $request->telephone_contact,
            'email' => $request->contact,
        ]);

        Provider::create([
            'id' => $person->id,
            'contact' => $request->contact,
            'telephone_contact' => $request->telephone_contact,
        ]);
        return redirect()->back()->with('success', "El proveedor $person->name ha sido creado");

    }

    public function edit($provider)
    {
        $provider = Provider::withTrashed()->whereId($provider)->first();
        return view('providers.edit', compact('provider'));

    }

    public function update(Request $request, $provider)
    {
        $provider = Provider::withTrashed()->whereId($provider)->first();
        $person = $provider->person;


        $person->name = $request->name;
        $person->type_doc = $request->type_doc;
        $person->num_doc = $request->num_doc;
        $person->address = $request->address;
        $person->telephone = $request->telephone_contact;
        $person->email = $request->email;
        $person->save();

        $provider->contact = $request->contact;
        $provider->telephone_contact = $request->telephone_contact;
        $provider->save();

        return redirect()->back()->with('success', "El proveedor $person->name ha sido creado");
    }

    public function deactive($provider)
    {
        $provider = Provider::withTrashed()->whereId($provider)->first();
        $person = $provider->person;
        $provider->delete();
        $person->delete();

        return redirect()->back()->with('success', "El proveedor $person->name ha sido creado");

    }

    public function active($provider)
    {
        $provider = Provider::withTrashed()->whereId($provider)->first();
        $person = Person::withTrashed()->whereId($provider->id)->first();
        $person->restore();
        $provider->restore();
        return redirect()->back()->with('success', "El proveedor $person->name ha sido creado");
    }
}
