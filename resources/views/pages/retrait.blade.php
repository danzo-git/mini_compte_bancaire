<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


   // @csrf
    {{--  <input type="hidden"  name="id" value="{{$client->id}}">  --}}
    {{--  <input type="text" name="montant" placeholder="entrer le montant du retrait">  --}}
       
 <form action="{{route('gestion.retrait')}}" method="post">
            @csrf
<h1> <i><u>page de  depot </u></i></h1>
           <h1>  client {{$client->nom}} {{$client->prenom}}</h1>
            <input type="hidden" name="id" value="{{$client->id}}">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<div class="form__group">
  <input type="text" name ="montant" class="form__input" id="name" placeholder="entrer le montant" required="" />
  <label for="name" class="form__label">Full Name</label>
</div>
 </form>
<style>
*,
*::after,
*::before {
  margin: 0;
  padding: 0;
  box-sizing: inherit;
  font-size: 62,5%;
}

body {
  height: 100vh;
	width: 100%;
  background: #0f2027; /* fallback for old browsers */
  background: linear-gradient(to right,#2c5364, #203a43, #0f2027);
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  color: #fff;
}

.form__label {
  font-family: 'Roboto', sans-serif;
  font-size: 1.2rem;
  margin-left: 2rem;
  margin-top: 0.7rem;
  display: block;
  transition: all 0.3s;
  transform: translateY(0rem);
}

.form__input {
  font-family: 'Roboto', sans-serif;
  color: #333;
  font-size: 1.2rem;
	margin: 0 auto;
  padding: 1.5rem 2rem;
  border-radius: 0.2rem;
  background-color: rgb(255, 255, 255);
  border: none;
  width: 90%;
  display: block;
  border-bottom: 0.3rem solid transparent;
  transition: all 0.3s;
}

.form__input:placeholder-shown + .form__label {
  opacity: 0;
  visibility: hidden;
  -webkit-transform: translateY(-4rem);
  transform: translateY(-4rem);
}

</style>
</form>

</body>
</html>
