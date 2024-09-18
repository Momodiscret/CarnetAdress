<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * fonction pour lire tous les contact
     */
    public function index()
    {
        return Contact::all();
    }

    /**
     * fonction pour creer un contact
     */
    public function store(Request $request)
    { 
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|unique:contacts,email',
        ]);
    
        return Contact::create($validated);
        
    }

    /**
     * fonction pour lire un contact specifique
     */
    public function show(string $contact)
    {
        return $contact;
    }

    /**
     * fonction pour mettre ajour un contact
     */
    public function update(Request $request, Contact $contact)
    {
        $validated = $request->validate([
            'nom' => 'sometimes|required|string|max:255',
            'telephone' => 'sometimes|required|string|max:20',
            'email' => 'sometimes|required|email|unique:contacts,email,'.$contact->id,
        ]);
    
        $contact->update($validated);
        return $contact;
    }

    /**
     * fonction pour supprimer un contact
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return response(null, 204);
    }
}
