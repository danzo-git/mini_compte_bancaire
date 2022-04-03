@extends('pages.template')

@section('content')
    <div class="card">
        @include('layouts.app')
        @section('css')
    <style>
        .card-footer {
            justify-content: center;
            align-items: center;
            padding: 0.4em;
        }
    </style>
@endsection






@section('content')
    @if(session()->has('info'))
        <div class="notification is-success">
            {{ session('info') }}
        </div>
    @endif
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">administrateur  {{ Auth::user()->name }}</p>
            <a class="button is-info mr-3" href="{{ route('client.create') }}">Créer un Client</a>

             {{-- <a class="button is-info" href="{{ route('client.create') }}">effectuez un virement</a> --}}
        </header>
 <div class="card-content">
            <div class="content">
                <table class="table is-hoverable">
                     <thead>
                        <tr>
                            <th>image</th>
                            <th>nom</th>
                            <th>solde</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($clients as $client)
                            <tr @if($client->deleted_at) class="has-background-grey-lighter" @endif>
                                  <td><img src="{{asset("uploads/".$client->photo)}}" alt=""  height="60" width="60"></td>
                                <td><strong>{{ $client->nom }}</strong></td>
                                <td><strong>{{ $client->solde }}</strong></td>
                                 <td><a class="button is-primary" href="{{ route('client.show', $client->id) }}">Voir</a></td>
                                <td><a class="button is-warning" href="{{ route('client.edit', $client->id) }}">Modifier</a></td>
                                {{-- <td><a class="button is-warning" href="{{ route('client.ajouter', $client->id) }}">ajouter</a></td> --}}
                                <td><a class="button is-primary" href="{{ route('gestion.ajouter', $client->id) }}">ajouter</a></td>
                                <td><a class="button is-primary" href="{{ route('gestion.retraits', $client->id) }}">retrait</a></td>
                                @if($client->deleted_at)
                                <td>
                                <form action="{{ route('client.restore', $client->id) }}" method="get">
                                    @csrf
                                    {{--  @method('DELETE')  --}}
                                    <button class="button is-primary" type="submit">Restaurer</button>
                                </form>
                            </td>
                                @else
                                <td><a class="button is-primary" href="{{ route('client.show', $client->id) }}">Voir</a></td>
                                @endif
                                @if($client->deleted_at)
                                @else
                                <td><a class="button is-warning" href="{{ route('client.edit', $client->id) }}">Modifier</a></td>
                                @endif
                                <td>
                                 <form action="{{ route('client.destroy', $client->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="button is-danger" type="submit">Suspendre</button>
                                    </form> 
                                </td>
                                <td>
                                                                     <form action="{{ route('client.force.destroy', $client->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="button is-danger" type="submit">Supprimer </button>
                                   
</form> 
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{--  <!-- <div class="card">
                    <header class="card-header">
                        <p class="card-header-title">emploi</p>
                        <div class="select">
                            <select onchange="window.location.href = this.value">
                                <option value="{{ route('emploi.index') }}" @unless($slug) selected @endunless>Toutes catégories</option>
                                @foreach($categories as $category)
                                    <option value="{{ route('emploi.category', $category->slug) }}" {{ $slug == $category->slug ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div> -->  --}}

                    </header>
                <footer class="card-footer">
                    {{ $clients->links() }}
                </footer>

            </div>
        </div>
@endsection
