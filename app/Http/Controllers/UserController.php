<?php

namespace Upanel\Http\Controllers;

use Illuminate\Http\Request;
use Upanel\Person;
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
        return view('users.create');
    }

    public function store(Request $request)
    {
        $person = Person::create($request->all());

        User::create([
            'id' => $person->id,
            'user' => $request->user,
            'password' => $request->password
        ]);

        return redirect()->back();
    }
}
