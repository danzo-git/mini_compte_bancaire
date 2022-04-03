
@extends('layout.app')
<!------ Include the above in your HEAD tag ---------->
@section('content')
<div class="row">
    <div class="col-md-6 mx-auto p-0">
        <div class="card">
            <div class="login-box">
                <div class="login-snip"> <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Connexion</label> <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Inscription</label>
                    <div class="login-space">
                        <div class="login">

<form action="{{route('client.verifier')}}" method="post">
    @csrf

                            <div class="group"> <label for="user" class="label">numero</label> <input id="user"  name="telephone" type="text" class="input" placeholder="Entrez votre numero" required> </div>
                            <div class="group"> <label for="pass" class="label">mot de passe</label> <input id="pass"  name="mdp" type="password" class="input" data-type="password" placeholder="Entrez votre mot de pass" required> </div>
                            <!-- <div class="group"> <input id="check" type="checkbox" class="check" checked> <label for="check"><span class="icon"></span> Keep me Signed in</label> </div> -->
                            <div class="group"> <button class="btn btn-primary"> se connecter</button> </div>
                            <div class="hr"></div>
                            <!-- <div class="foot"> <a href="#">Forgot Password?</a> </div> -->
                        </div>
                    </form>
                        <div class="sign-up-form"><form action="{{route('gestion.insertion')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="group"> <label for="user" class="label">nom</label> <input id="" name="nom" type="text" class="input" placeholder="Entrez votre nom" required> </div>
                            <div class="group"> <label for="user" class="label">prenom</label> <input id="user" name="prenom" type="text" class="input" placeholder="Entrez votre prenom" required> </div>
                            <div class="group"> <label for="user" class="label">Cni</label> <input id="user" name="cni" type="text" class="input" placeholder="Numero de CNI" required> </div>
                            <div class="group"> <label for="pass" class="label">telephone</label> <input id="pass"  name="telephone" type="text" class="input" placeholder="Numero de telephone" required> </div>
                            <div class="group"> <label for="user" class="label">date de naissance</label> <input id="user" type="date"  name="date_naissance" class="input" placeholder="Date de naissance" required> </div>
                            <div class="group"> <label for="user" class="label">lieu de naissance</label> <input id="user" type="text" name="lieu_naissance" class="input" placeholder="Lieu de naissance" required> </div>
                            <div class="group"> <label for="user" class="label">profession</label> <input id="user" name="profession" type="text" class="input" placeholder="Quelle est votre profession" required> </div>
                            <div class="group"> <label for="pass" class="label">password</label> <input id="pass"  name="mdp" type="password" class="input" data-type="password" placeholder="Creez un mot de passe" required> </div>
                            <div class="group"> <label for="pass" class="label">email</label> <input id="pass"  name="email" type="email" class="input" data-type="password" placeholder="Entrez votre mail" required> </div>
                            <div class="group"> <label for="pass" class="label">sexe</label>  <select name="sexe" id=""  required>

                                <option value="homme">Homme</option>
                                <option value="femme">Femme</option>
                            </select>
                         </div>
                         <div class="group"> <label for="pass" class="label">Photo</label> <input id="pass" type="file" name="photo" class="" data-type="" placeholder="Inserez une photo" required> </div>
                         <div class="group"> <label for="pass" class="label">Solde</label> <input id="pass"  name="solde" type="number" disabled class="input" data-type=""  value="0"  required> </div>


                            <div class="group"> <button class="btn btn-primary">Envoyer</button> </div>
                            <div class="hr"></div>
                        </form>
                       {{-- {{ $details['title']}}
                       {{ $details['body']}} --}}
                            <div class="foot"> <label for="tab-1">Deja membre?</label> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    body {
    margin: 0;
    color: #6a6f8c;
    background: #c8c8c8;
    font: 600 16px/18px 'Open Sans', sans-serif
}

.login-box {
    width: 100%;
    margin: auto;
    max-width: 525px;
    min-height: 670px;
    position: relative;
    background: url(https://images.unsplash.com/photo-1507208773393-40d9fc670acf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1268&q=80) no-repeat center;
    box-shadow: 0 12px 15px 0 rgba(0, 0, 0, .24), 0 17px 50px 0 rgba(0, 0, 0, .19)
}

.login-snip {
    width: 100%;
    height: 180%;
    position: absolute;
    padding: 90px 70px 50px 70px;
    background: rgba(0, 77, 77, .9)
}

.login-snip .login,
.login-snip .sign-up-form {
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    position: absolute;
    transform: rotateY(180deg);
    backface-visibility: hidden;
    transition: all .4s linear
}

.login-snip .sign-in,
.login-snip .sign-up,
.login-space .group .check {
    display: none
}

.login-snip .tab,
.login-space .group .label,
.login-space .group .button {
    text-transform: uppercase
}

.login-snip .tab {
    font-size: 22px;
    margin-right: 15px;
    padding-bottom: 5px;
    margin: 0 15px 10px 0;
    display: inline-block;
    border-bottom: 2px solid transparent
}

.login-snip .sign-in:checked+.tab,
.login-snip .sign-up:checked+.tab {
    color: #fff;
    border-color: #1161ee
}

.login-space {
    min-height: 345px;
    position: relative;
    perspective: 1000px;
    transform-style: preserve-3d
}

.login-space .group {
    margin-bottom: 15px
}

.login-space .group .label,
.login-space .group .input,
.login-space .group .button {
    width: 100%;
    color: #fff;
    display: block
}

.login-space .group .input,
.login-space .group .button {
    border: none;
    padding: 15px 20px;
    border-radius: 25px;
    background: rgba(255, 255, 255, .1)
}

.login-space .group input[data-type="password"] {
    text-security: circle;
    -webkit-text-security: circle
}

.login-space .group .label {
    color: #aaa;
    font-size: 12px
}

.login-space .group .button {
    background: #1161ee
}

.login-space .group label .icon {
    width: 15px;
    height: 15px;
    border-radius: 2px;
    position: relative;
    display: inline-block;
    background: rgba(255, 255, 255, .1)
}

.login-space .group label .icon:before,
.login-space .group label .icon:after {
    content: '';
    width: 10px;
    height: 2px;
    background: #fff;
    position: absolute;
    transition: all .2s ease-in-out 0s
}

.login-space .group label .icon:before {
    left: 3px;
    width: 5px;
    bottom: 6px;
    transform: scale(0) rotate(0)
}

.login-space .group label .icon:after {
    top: 6px;
    right: 0;
    transform: scale(0) rotate(0)
}

.login-space .group .check:checked+label {
    color: #fff
}

.login-space .group .check:checked+label .icon {
    background: #1161ee
}

.login-space .group .check:checked+label .icon:before {
    transform: scale(1) rotate(45deg)
}

.login-space .group .check:checked+label .icon:after {
    transform: scale(1) rotate(-45deg)
}

.login-snip .sign-in:checked+.tab+.sign-up+.tab+.login-space .login {
    transform: rotate(0)
}

.login-snip .sign-up:checked+.tab+.login-space .sign-up-form {
    transform: rotate(0)
}

*,
:after,
:before {
    box-sizing: border-box
}

.clearfix:after,
.clearfix:before {
    content: '';
    display: table
}

.clearfix:after {
    clear: both;
    display: block
}

a {
    color: inherit;
    text-decoration: none
}

.hr {
    height: 2px;
    margin: 60px 0 50px 0;
    background: rgba(255, 255, 255, .2)
}

.foot {
    text-align: center
}

.card {
    width: 500px;
    left: 100px
}

::placeholder {
    color: #b3b3b3
}
</style>
@endsection
