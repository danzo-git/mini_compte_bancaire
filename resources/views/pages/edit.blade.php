@extends('pages.template')

@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">modification d'un client</p>
        </header>
        <div class="card-content">
            <div class="content">
                <form action="{{ route('client.update',$client->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="field">
                        <label class="label">nom</label>
                        <div class="control">
                          <input class="input" type="text" name="nom" value="{{ $client->nom}}" placeholder="entrez votre nom" required>
                        </div>
                         <div class="field">
                        <label class="label">prenom</label>
                        <div class="control">
                          <input class="input " type="text" name="prenom" value="{{ $client->prenom}}" placeholder="entrz votre prenom" required>
                        </div>

                    </div>
                    <div class="field">
                        <label class="label">solde de depart</label>
                        <div class="control">
                          <input class="input" type="number" name="solde" value="{{ $client->solde}}" placeholder="entrez votre solde" required>
                        </div>
                    <div class="field">
                        <label class="label">cni</label>
                        <div class="control">
                          <input class="input" type="text" name="cni" value="{{ $client->cni}}" placeholder="entrez votre cni" required>
                        </div>
                         <div class="field">
                        <label class="label">date de naissance</label>
                        <div class="control">
                          <input class="input" type="date" name="date_naissance" value="{{ $client->date_naissance}}" placeholder="" required>
                        </div>
                        @error('title')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="label">lieu de naissance</label>
                        <div class="control">
                          <input class="input" type="text" name="lieu_naissance" value="{{ $client->lieu_naissance}}"  placeholder='entrer votre lieu de naissance' required >
                        </div>


                    </div>
                    {{-- <div class="field">
                        <label class="label">profession</label>
                        <div class="control">
                          <input class="input @error('title') is-danger @enderror" type="text" name="profession" value="{{ old('profession') }}" placeholder="profession..">
                        </div> --}}
                         <div class="field">
                        <label class="label">sexe</label>
                        <div class="control">
                         <select name="sexe" id=""  required>

                             <option value="homme">homme</option>
                             <option value="femme">femme</option>
                         </select>
                        </div>

                    </div>
                    <div class="field">
                        <label class="label">profession</label>
                        <div class="control">
                          <input class="input @error('title') is-danger @enderror" type="text" name="profession" value="{{ $client->profession}}" placeholder="profession...">
                        </div>
                         <div class="field">
                        <label class="label">photo</label>
                        <div class="control">
                          <input class="input " type="file" name="photo" value="{{ $client->photo}}" placeholder="Titre du film" required>
                        </div>

                    </div>
                    <div class="field">
                        <label class="label">telephone</label>
                        <div class="control">
                          <input class="input" type="text" name="telephone" value="{{ $client->telephone}}" placeholder="entrez votre nom" required>
                        </div>
                         <div class="field">
                        <label class="label">email</label>
                        <div class="control">
                          <input class="input " type="text" name="email" value="{{ $client->email}}" placeholder="entrz votre prenom">
                        </div>

                    </div>
                    <div class="field">
                        <div class="control">
                          <button class="button is-link">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
