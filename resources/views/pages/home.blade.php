@extends('parties.templateAdmin',['titre'=>"Accueil"])
@section('title', 'Accueil')
@section('autres_style')
<link href="{{ asset('assets/css/jasny/jasny-bootstrap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2/select2.min.css') }}">
<link href="{{ asset('assets/css/clockpicker/clockpicker.css') }}" rel="stylesheet">
@endsection
@section('content')
{{-- {{ dd(  date("Y-m-d h:m:s")) }} --}}
@livewire("home")
@endsection
