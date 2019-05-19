<?php

namespace Upanel\Http\Controllers;

use Illuminate\Http\Request;
use Upanel\Person;
use Upanel\Role;
use Upanel\User;

class UserController extends Controller
{
    public function index()
    {
        $persons = Person::paginate();
        return view('users.index', compact('persons'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $person = Person::create($request->all());

        User::create([
            'id' => $person->id,
            'user' => $request->user,
            'role_id' => $request->role_id,
            'password' => $request->password,
        ]);

        return redirect()->back();
    }

    public function edit(Person $person)
    {
        $roles = Role::all();
        return view('users.edit', compact('person', 'roles'));
    }

    public function update(Request $request, Person $person)
    {
        $person->name = $request->name;
        $person->lastname = $request->lastname;
        $person->type_doc = $request->type_doc;
        $person->num_doc = $request->num_doc;
        $person->address = $request->address;
        $person->telephone = $request->telephone;
        $person->email = $request->email;
        $person->save();
        $user =  User::findOrFail($person->user->id);
        $user->user = $request->user;
        $user->password = $request->password;
        $user->role_id = $request->role_id;
        $user->save();

        return redirect()->back();
    }
}
