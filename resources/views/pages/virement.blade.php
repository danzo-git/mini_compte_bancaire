<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('gestion.virement')}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$client->id}}">
    <input type="text" name="destinataire"  placeholder="entrez le numero du destinataire"> <br>
    <input type="text" name="montant"  placeholder="entrez le montant" >
    <button type="submit">valider</button>
</form>
</body>
</html>
