<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    // fonction pour afficher les contacts
    public function index(){

        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    // fonction pour ajouter un contact
    public function store(Request $request){
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|unique:contacts,email',
        ]);

        Contact::create($validated);
        return redirect('/contacts')->with('success', 'Contact ajouté avec succès');
    }


}
