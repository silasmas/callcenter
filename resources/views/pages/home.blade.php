@extends('parties.templateAdmin',['titre'=>"Accueil"])
@section('title', 'Accueil')
@section('autres_style')
<link href="{{ asset('assets/css/jasny/jasny-bootstrap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/js/parsley/parsley.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-markdown/bootstrap-markdown.min.css') }}">

@endsection
@section('content')


@livewire("home")
@endsection
@section('autres-script')
<script src="{{ asset('assets/js/bootstrap-markdown/bootstrap-markdown.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-markdown/markdown.js') }}"></script>
<script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/js/jasny/jasny-bootstrap.min.js') }}"></script>


<script src="{{ asset('assets/js/parsley/js/parsley.js') }}"></script>
<script src="{{ asset('assets/js/parsley/i18n/fr.js') }}"></script>

<script>
    $(document).ready(function() {
        $('.summernote').summernote();      
        $(".select2").select2(); 
    });
</script>
@endsection