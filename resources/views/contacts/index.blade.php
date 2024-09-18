<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carnet d'adresses</title>
</head>
<body>
    <h1>Listes des contacts</h1>
    <ul>
        @foreach($contacts as $contact)
            <li>{{ $contact->nom }} - {{ $contact->telephone }} - {{ $contact->email }}</li>
        @endforeach
    </ul>

    <h2>Ajouter un nouveau contact</h2>
    <form action="/contacts" method="POST">
        @csrf
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" required><br>
        <label for="telephone">Téléphone :</label>
        <input type="text" name="telephone" id="telephone" required><br>
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required><br>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
