@extends('parties.templateAdmin',['titre'=>"Admin"])
@section('title', 'Admin')
@section('autres_style')
<link href="{{ asset('assets/css/jasny/jasny-bootstrap.min.css') }}" rel="stylesheet">
@endsection
@section('content')
@livewire("dashbord")
@endsection
@section('autres-script')

@endsection