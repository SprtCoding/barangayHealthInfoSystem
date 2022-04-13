@extends('layouts.app')
@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">BHI</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col mt-4">
                        <h1>Barangay Health Information</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <img src="{{ URL('img/logo.jpg') }}" alt="images" class="my-logo">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col mt-4">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the
                            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                            type and
                            scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                            leap
                            into
                            electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with
                            the
                            release of
                            Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing
                            software like
                            Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the
                            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                            type and
                            scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                            leap
                            into
                            electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with
                            the
                            release of
                            Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing
                            software like
                            Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the
                            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                            type and
                            scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                            leap
                            into
                            electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with
                            the
                            release of
                            Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing
                            software like
                            Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col flex justify-center mt-4 sm:items-center">
                        <button id="bt-log" type="button" class="btn btn-outline-success bt-log">Log in</button>
                        <button id="bt-sign" type="button" class="btn btn-outline-success bt-sign">Sign up</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {

            //firebase credentials
            const firebaseConfig = {
                apiKey: "{{ config('services.firebase.apiKey') }}",
                authDomain: "{{ config('services.firebase.authDomain') }}",
                projectId: "{{ config('services.firebase.projectId') }}",
                storageBucket: "{{ config('services.firebase.storageBucket') }}",
                messagingSenderId: "{{ config('services.firebase.messagingSenderId') }}",
                appId: "{{ config('services.firebase.appId') }}",
                measurementId: "{{ config('services.firebase.measurementId') }}",
                databaseURL: "{{ config('services.firebase.databaseURL') }}"
            };

            firebase.initializeApp(firebaseConfig);
            firebase.analytics();

            //check if user is login
            firebase.auth().onAuthStateChanged((user) => {
                if (user) {
                    // User is signed in, see docs for a list of available properties
                    // https://firebase.google.com/docs/reference/js/firebase.User
                    userID = user.uid;
                    var userEmail = user.email;

                    {{-- var starCountRef = firebase.database().ref('Users/' + userID +
                        '/name');
                    starCountRef.on('value', (snapshot) => {
                        const data = snapshot.val();
                        var name = $('#name').text(data);
                        var email = $('#myEmail').text(user.email);
                    });

                    var name;
                    var starCountRef1 = firebase.database().ref('Users/' + userID);
                    starCountRef1.on('value', (snapshot) => {
                        const data = snapshot.val();
                        name = data.name;

                        firebase.database().ref('UsersLogs/' + userID).set({
                            UID: userID,
                            UserEmail: userEmail,
                            UserName: name,
                            Date_of_login: current_date,
                            Hours_of_login: current_time,
                        });
                    });

                    $('#logout_btn').on('click', function() {
                        firebase.auth().signOut().then(() => {
                            // Sign-out successful.
                            MsgSession("Logout successfully");
                            var email = $('#myEmail').text("");
                            location.replace('/login');
                            btnLoginShow();
                        }).catch((error) => {
                            // An error happened.
                            MsgSession("Logout un-successfully");
                            btnLogoutShow();
                        });
                    }); --}}
                } else {
                    // User is signed out
                    location.replace('/login');
                }
            });

            $('#bt-log').on('click', function() {
                location.replace('login');
            });
            $('#bt-sign').on('click', function() {
                location.replace('signup');
            });
        })
    </script>
@endpush
