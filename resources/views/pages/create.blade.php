@extends('pages.template')

@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Création d'un client</p>
        </header>
        <div class="card-content">
            <div class="content">
                <form action="{{ route('client.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="field">
                        <label class="label">nom</label>
                        <div class="control">
                          <input class="input" type="text" name="nom" value="{{ old('nom') }}" placeholder="entrez votre nom" required>
                        </div>
                         <div class="field">
                        <label class="label">prenom</label>
                        <div class="control">
                          <input class="input " type="text" name="prenom" value="{{ old('prenom') }}" placeholder="entrz votre prenom" required>
                        </div>

                    </div>
                    <div class="field">
                        <label class="label">solde de depart</label>
                        <div class="control">
                          <input class="input" type="number" name="solde" value="{{ old('solde') }}" placeholder="entrez votre solde" required>
                        </div>
                    <div class="field">
                        <label class="label">cni</label>
                        <div class="control">
                          <input class="input" type="text" name="cni" value="{{ old('cni') }}" placeholder="entrez votre cni" required>
                        </div>
                         <div class="field">
                        <label class="label">date de naissance</label>
                        <div class="control">
                          <input class="input" type="date" name="date_naissance" value="{{ old('date_naissance') }}" placeholder="" required>
                        </div>
                        @error('title')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="label">lieu de naissance</label>
                        <div class="control">
                          <input class="input" type="text" name="lieu_naissance" value="{{ old('lieu_naissance') }}"  placeholder='entrer votre lieu de naissance' required >
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
                        @error('title')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="label">profession</label>
                        <div class="control">
                          <input class="input @error('title') is-danger @enderror" type="text" name="profession" value="{{ old('profession') }}" placeholder="profession...">
                        </div>
                         <div class="field">
                        <label class="label">photo</label>
                        <div class="control">
                          <input class="input" type="file" name="photo" required>
                        </div>

                    </div>
                    <div class="field">
                        <label class="label">telephone</label>
                        <div class="control">
                          <input class="input" type="text" name="telephone" value="{{ old('telephone') }}" placeholder="entrez votre nom" required>
                        </div>
                         <div class="field">
                        <label class="label">email</label>
                        <div class="control">
                          <input class="input " type="text" name="email" value="{{ old('email') }}" placeholder="entrz votre prenom">
                        </div>
                        <label class="label">mdp</label>
                        <div class="control">
                          <input class="input " type="text" name="mdp"  placeholder="entrer votre mdp">
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
