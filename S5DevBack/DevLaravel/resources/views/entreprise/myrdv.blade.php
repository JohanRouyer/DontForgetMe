@extends('base')

@section('title', 'Display resa')
@section('catalogue_active', 'active')

@section('content')
@if (session('success'))
    <div class="success-message" role="alert">
        {{ session('success') }}
    </div>
@endif
    <!-- Corps -->
    <div class="container-fluid page-body">
        <div class="container">
            <div class="container">
                <h2><b>Mes rendez-vous</b></h2>
            </div>
            <div class="rdv-list">
                <div class="container visible-container rdv-container">
                    <div class="rdv-image"><img width="120px" height="90px" src="images/rdv.png"></div>
                    <a href="#" class="rdv-info">
                        <div>
                            <div class="rdv-title">Rendez-vous 1</div>
                            <div>Métier</div>
                            <div class="row">
                                <div class="col-md-6">Adresse : rendezvous1@gmail.com</div>
                                <div class="col-md-6">Numéro : 07 25 76 43 01</div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="rdv-button">              
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="60px" height="60px" fill="#FFFFFF">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                            <g id="SVGRepo_iconCarrier"> <path d="M3 10H21M7 3V5M17 3V5M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.07989 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z" stroke="#000000" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/> </g>    
                        </svg>
                        <div>Book</div>
                    </a>
                </div>
                <div class="container visible-container rdv-container">
                    <div class="rdv-image"><img width="120px" height="90px" src="images/rdv.png"></div>
                    <a href="#" class="rdv-info">
                        <div>
                            <div class="rdv-title">Rendez-vous 2</div>
                            <div>Métier</div>
                            <div class="row">
                                <div class="col-md-6">Adresse : rendezvous2@gmail.com</div>
                                <div class="col-md-6">Numéro : 07 25 76 43 02</div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="rdv-button">              
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="60px" height="60px" fill="#FFFFFF">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                            <g id="SVGRepo_iconCarrier"> <path d="M3 10H21M7 3V5M17 3V5M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.07989 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z" stroke="#000000" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/> </g>    
                        </svg>
                        <div>Book</div>
                    </a>
                </div>
                <div class="container visible-container rdv-container">
                    <div class="rdv-image"><img width="120px" height="90px" src="images/rdv.png"></div>
                    <a href="entreprise-profile.html" class="rdv-info">
                        <div>
                            <div class="rdv-title">Paradis Grill</div>
                            <div>Coiffeur</div>
                            <div class="row">
                                <div class="col-md-6">Adresse : paradis-grill@gmail.com</div>
                                <div class="col-md-6">Numéro : 06 67 07 33 85</div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="rdv-button">              
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="60px" height="60px" fill="#FFFFFF">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                            <g id="SVGRepo_iconCarrier"> <path d="M3 10H21M7 3V5M17 3V5M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.07989 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z" stroke="#000000" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/> </g>    
                        </svg>
                        <div>Book</div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <div class="footer">
        <a href="index.html">Retour à l'accueil</a>
    </div>

    @endsection