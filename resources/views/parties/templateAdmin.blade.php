<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | {{ isset($titre) ? $titre : '' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    <script src="{{ asset('assets/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="icon" href="{{ asset('assets/logo/logo.png') }}" type="image/rdp-icon">

    <!-- Styles -->

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/js/sweetalert/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/summernote/summernote.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/js/parsley/parsley.css') }}">
    @yield('autres_style')

    @livewireStyles();
</head>

<body class="">
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <span>
                                <img alt="image" class="img-circle" src="{{ asset('assets/img/default.png') }}"
                                    width="100" />
                            </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{
                                            Auth::user()->name }}</strong>
                                    </span> <span class="text-muted text-xs block">{{ Auth::user()->fonction }} <b
                                            class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="">Profile</a></li>
                                <li class="divider"></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Déconnexion
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            {{ config('app.name') }}
                        </div>
                    </li>


                    <li class="{{ $titre == 'Accueil' ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}"><i class="fa fa-home"></i>
                            <span class="nav-label">Accueil</span></a>
                    </li>
                    @if(Auth::user()->niveau==3 )
                    <li class="{{ $titre == 'Admin' ? 'active' : '' }}">
                        <a href="{{ route('admin') }}"><i class="fa fa-th-large"></i>
                            <span class="nav-label">Dashboard</span></a>
                    </li>

                    @endif
                    @if(Auth::user()->niveau==3||Auth::user()->niveau==2)

                    <li class="">
                        <a href="#"><i class="fa fa-pencil"></i> <span class="nav-label">Pages </span>
                            <span class="pull-right label label-primary">Gestion</span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="{{ $titre == 'Gestion Banche' || $titre == 'Gestion Service' ? 'active' : '' }}">
                                <a href="">
                                    <span class="nav-label">Script</span></a>
                            </li>
                            <li class="{{ $titre == 'Gestion Temoignage' ? 'active' : '' }}">
                                <a href="">
                                    <span class="nav-label">Statut</span></a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if(Auth::user()->niveau==3||Auth::user()->niveau==2)

                    <li class="">
                        <a href="#"><i class="fa fa-plus"></i> <span class="nav-label">Pages </span>
                            <span class="pull-right label label-primary">Insertion</span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="{{ $titre == 'Ajout Script' ? 'active' : '' }}">
                                <a href="{{ route('addScript') }}">
                                    <span class="nav-label">Ajouter un script</span></a>
                            </li>
                            <li class="{{ $titre == 'Ajout Statut' ? 'active' : '' }}">
                                <a href="{{ route('addStatut') }}">
                                    <span class="nav-label">Ajouter un statut</span></a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if(Auth::user()->niveau==3)

                    <li class="{{ $titre == 'Gestion user' ? 'active' : '' }}">
                        <a href="{{ route('guser') }}">
                            <i class="fa fa-users"></i>
                            <span class="nav-label">Utilisateurs</span>
                        </a>
                    </li>
                    @endif
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i
                                class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" action="search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="Tapez le nom ou le numéro du client"
                                    class="form-control" name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Bienvenue dans l'espace Admin du
                                <b>{{ config('app.name') }} </b></span>
                        </li>

                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i> Déconnexion
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        <li>
                            <a class="right-sidebar-toggle">
                                <i class="fa fa-tasks"></i>
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>{{ $titre }}</h2>
                </div>
            </div>

            @yield('content')

            <div class="footer">
                <div class="pull-right">

                </div>
                <div>
                    <a href='silasdev.com'> <strong>Copyright</strong> SDev &copy; 2022 </a>
                </div>
            </div>
        </div>
        @include('parties.nav')
    </div>


    <script src="{{ asset('assets/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('assets/js/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('assets/js/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('assets/js/inspinia.js') }}"></script>
    <script src="{{ asset('assets/js/pace/pace.min.js') }}"></script>
    <script src="{{ asset('assets/js/pace/pace.min.js') }}"></script>

    <script src="{{ asset('assets/js/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('assets/js/parsley/js/parsley.js') }}"></script>
    <script src="{{ asset('assets/js/parsley/i18n/fr.js') }}"></script>
    @livewireScripts();
    @yield('autres-script')
    {{-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
    <script>
        window.addEventListener('swal:modal', event => {
            swal({
                title: event.detail.titre,
                text: event.detail.text,
                icon: event.detail.type,
            });
        });
        window.addEventListener('swal:confirm', event => {
            swal({
                title: event.detail.titre,
                text: event.detail.text,
                icon: event.detail.type,
                dangerMode: true,
                buttons: {
                    cancel: 'Non',
                    delete: 'OUI'
                }
            }).then(function(willDelete) {
                if (willDelete) {
                    switch (event.detail.from) {
                        case 'Monpanier':
                            window.livewire.emit('removeCardeMonPanier', event.detail.id);
                            break;
                        case 'panier':

                            window.livewire.emit('removeCarde', event.detail.id);
                            break;
                        case 'Detail':

                            window.livewire.emit('ajoutCardsDetail', event.detail.id);
                            break;

                        default:
                            break;
                    }
                }

            });
        });

        function load(id) {
            $(id).children('.ibox-content').toggleClass('sk-loading');
        }

        function add(url, form, id) {
            event.preventDefault();
        
            load(id);
            $.ajax({
                url: url,
                method: "POST",
                data: $(form).serialize(),"_token": "{{ csrf_token() }}",
                success: function(data) {
                    load(id);
                    if (!data.reponse) {
                        swal({
                            title: data.msg,
                            icon: 'error'
                        })

                    } else {
                        $(form)[0].reset();
                        swal({
                            title: data.msg,
                            icon: 'success'
                        })
                        //  actualiser();
                    }
                },
            });
        }

        function supprimer(url, id) {
            // alert(url)
            swal({
                title: "Attention suppression",
                text: "Etes-vous sûre de supprimer cet élement ?",
                icon: 'warning',
                dangerMode: true,
                buttons: {
                    cancel: 'Non',
                    delete: 'OUI'
                }
            }).then(function(willDelete) {
                if (willDelete) {
                    load("#tab-user");
                    $.ajax({
                        url: url + "/" + id,
                        method: "GET",
                        data: "",
                        success: function(data) {
                            load("#tab-user");
                            if (!data.reponse) {
                                swal({
                                    title: data.msg,
                                    icon: 'error'
                                })

                            } else {
                                swal({
                                    title: data.msg,
                                    icon: 'success'
                                })
                                actualiser();
                            }
                        },
                    });
                } else {
                    swal({
                        title: "Suppression annuler",
                        icon: 'error'
                    })
                }
            });
        }

        function actualiser() {
            location.reload();
        }

        function load(id) {
            $(id).children('.ibox-content').toggleClass('sk-loading');
        }
    </script>
</body>

</html>