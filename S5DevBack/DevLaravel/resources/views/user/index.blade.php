@extends('base')

@section('title', Auth::user()->nom . ' ' . Auth::user()->prenom)
@section('profile_active', 'active')

@section('content')
@if (session('success'))
    <div class="success-message" role="alert">
        {{ session('success') }}
    </div>
@endif

    <!-- Corps -->
    <div class="container-fluid page-body">
        <div class="container">
            <div class="back-button">
                <a href="{{ route('home') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.0" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32" width="20" height="20">
                        <g>
                        <line stroke="#000" stroke-width="3" stroke-linecap="undefined" stroke-linejoin="undefined" id="svg_2" y2="16" x2="28.58359" y1="16" x1="3.90105" fill="none"/>
                        <line stroke-width="3" stroke="#000" stroke-linecap="undefined" stroke-linejoin="undefined" id="svg_8" y2="14.96111" x2="2.87351" y1="28.02369" x1="15.93609" fill="none"/>
                        <line transform="rotate(90 9.4048 10.4905)" stroke="#000" stroke-width="3" stroke-linecap="undefined" stroke-linejoin="undefined" id="svg_9" y2="3.95918" x2="2.87351" y1="17.02176" x1="15.93609" fill="none"/>
                        </g>
                    </svg>
                </a>
            </div>
            <div class="container">
                <h2><b><span style="text-transform: uppercase;">Deschamps</span> <span>Bastien</span></b></h2>
            </div>
            <div class="row profile-info">
                <div class="col-lg-6 profile-field">
                    <div class="profile-field-title">Description</div>
                    <div class="profile-field-content">Je ne m'appelle pas Didier je sais, mais un jour j'atteindrai son niveau.</div>
                </div>
                <div class="col-lg-6 profile-field">
                    <div class="profile-field-title">Contacts</div>
                    <div class="profile-field-content">
                        <!-- Mail icon -->
                        <svg class="profile-field-icon" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" width="19px" height="19px" stroke="#000000">
                            <g id="mail">
                                <path d="M29,6H3L2.92,6a.78.78,0,0,0-.21,0l-.17.07a.65.65,0,0,0-.15.1.67.67,0,0,0-.15.14l-.06.06a.36.36,0,0,0,0,.09,1.08,1.08,0,0,0-.08.19A1.29,1.29,0,0,0,2,6.9S2,7,2,7V25a1,1,0,0,0,1,1H29a1,1,0,0,0,1-1V7A1,1,0,0,0,29,6ZM16,14.81,6.2,8H27.09ZM4,24V8.91l11.43,7.91,0,0a1.51,1.51,0,0,0,.18.09l.08,0A1.09,1.09,0,0,0,16,17h0a1,1,0,0,0,.41-.1l.07,0,0,0L28,9.79V24Z"/>
                            </g>
                        </svg>bastien.deschamps@gmail.com
                    </div>
                    <div class="profile-field-content">
                        <!-- Phone icon -->
                        <svg class="profile-field-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="19px" height="19px" stroke="#000000">
                            <path d="M14.3308 15.9402L15.6608 14.6101C15.8655 14.403 16.1092 14.2384 16.3778 14.1262C16.6465 14.014 16.9347 13.9563 17.2258 13.9563C17.517 13.9563 17.8052 14.014 18.0739 14.1262C18.3425 14.2384 18.5862 14.403 18.7908 14.6101L20.3508 16.1702C20.5579 16.3748 20.7224 16.6183 20.8346 16.887C20.9468 17.1556 21.0046 17.444 21.0046 17.7351C21.0046 18.0263 20.9468 18.3146 20.8346 18.5833C20.7224 18.8519 20.5579 19.0954 20.3508 19.3L19.6408 20.02C19.1516 20.514 18.5189 20.841 17.8329 20.9541C17.1469 21.0672 16.4427 20.9609 15.8208 20.6501C10.4691 17.8952 6.11008 13.5396 3.35083 8.19019C3.03976 7.56761 2.93414 6.86242 3.04914 6.17603C3.16414 5.48963 3.49384 4.85731 3.99085 4.37012L4.70081 3.65015C5.11674 3.23673 5.67937 3.00464 6.26581 3.00464C6.85225 3.00464 7.41488 3.23673 7.83081 3.65015L9.40082 5.22021C9.81424 5.63615 10.0463 6.19871 10.0463 6.78516C10.0463 7.3716 9.81424 7.93416 9.40082 8.3501L8.0708 9.68018C8.95021 10.8697 9.91617 11.9926 10.9608 13.04C11.9994 14.0804 13.116 15.04 14.3008 15.9102L14.3308 15.9402Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>06.66.39.33.51
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-hpts">
            <a href="#" class="btn btn-primary">
                <div>Créer une entreprise</div>
            </a>
            <a href="#" class="btn btn-secondary">
                <div>Modifier mon profil</div>
            </a>
        </div>
    </div>

    @endsection

{{--

@section('content')

<div class="container">
    <div style="border-bottom: 2px #1dacff solid;">
        <h1 >Votre profil</h1>
        <br/>
    </div>
    <div class="containerEntreprise">
    <div class="entreprise" id="profil">
        <h2>{{ $utilisateur->nom }} {{ $utilisateur->prenom }}</h2>
        <p><strong>Email : </strong>{{ $utilisateur->email }}</p>
        <p><strong>Numéro de téléphone : </strong>{{ $utilisateur->numTel }}</p>
        <p><strong>Notification par défaut : </strong>{{ $utilisateur->typeNotif }}</p>
        <p><strong>Delai avant notification par défaut : </strong>{{ $utilisateur->delaiAvantNotif }}</p>
        @if ($utilisateur->superadmin)
            <h4><strong>Superadmin</strong></h4>
        @endif
    </div>
    </div>
<div>

@endsection
--}}
