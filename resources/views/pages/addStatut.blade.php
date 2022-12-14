@extends('parties.templateAdmin',['titre'=>"Ajout Statut"])
@section('title', 'Accueil')
@section('autres_style')
<link href="{{ asset('assets/css/jasny/jasny-bootstrap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2/select2.min.css') }}">
@endsection
@section('content')


@livewire("add-statut")
@endsection
@section('autres-script')
<script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/js/jasny/jasny-bootstrap.min.js') }}"></script>
<script>
    $(document).ready(function() {      
        $(".select2").select2(); 
    });
</script>
@endsection