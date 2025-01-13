@extends('base')

@section('title', 'Display entreprise')
@section('entreprises_active', 'active')

@section('content')
<div class="container-fluid page-body">
    <div class="secondary-nav nav row">
        <p>
        @guest
        @else
          <a href="{{ route('parametrage.index') }}" class="secondary-nav-tab @yield('parametrage_active')">Paramétrer vos plannings</a> | 
        @endguest
          <a href="{{ route('reservation.index') }}" class="secondary-nav-tab @yield('catalogue_active')">Réservations</a> | 
          <a class="secondary-nav-tab current-secondary-nav-tab @yield('entreprises_active')">Entreprises</a> | 
          <a href="{{ route('calendrier.index') }}" class="secondary-nav-tab @yield('creneau_active')">Créneaux</a>
        </p>
    </div>
    <div class="res-container">
        @foreach ($entreprises as $entreprise)
            <div class="res">
                <h2>{{ $entreprise->libelle }}</h2>
                <div class="info">
                    <p><strong>Siren :</strong> {{ $entreprise->siren }}</p>
                    <p><strong>Adresse :</strong> {{ $entreprise->adresse }}</p>
                    <p><strong>Métier :</strong> {{ $entreprise->metier }}</p>
                    <p><strong>Description :</strong> {{ $entreprise->description }}</p>
                    <p><strong>Type :</strong> {{ $entreprise->type }}</p>
                    <p><strong>Numéro de téléphone :</strong> {{ $entreprise->numTel }}</p>
                    <p><strong>email :</strong> {{ $entreprise->email }}</p>
                    <img src="{{ json_decode($entreprise->cheminImg)[0] }}" alt="{{ $entreprise->libelle }}" height="260vh" width="260vh">
                    @if($entreprise->publier)
                    <p><strong>Publié !</strong></p>
                    @endif
                </div>
                <a class="secondary-button" href="{{ route('entreprise.show', ['entreprise' => $entreprise->id]) }}">Voir plus</a>
            </div>
        @endforeach
    </div>
</div>
    {{ $entreprises -> links() }}

@endsection
