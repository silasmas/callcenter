<div>
@section('autres_style')
<link href="{{ asset('assets/css/jasny/jasny-bootstrap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/js/parsley/parsley.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-markdown/bootstrap-markdown.min.css') }}">

@endsection

    <div class="wrapper wrapper-content animated fadeIn">
        <div class="row m-t-lg">
            @if (session()->has('message'))
            <div class="col-md-6 col-md-offset-3">
                <div class="alert alert-{{session()->get('type')}} alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    {{ session()->get('message') }}
                </div>
            </div>
            @endif
            <div class="col-lg-12">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="{{isset($service)?"":" active" }}"><a data-toggle="tab" href="#tab-branch">
                                Script
                            </a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" >
                            <div class="panel-body" id="tab-script">
                                <div class="ibox-content">
                                    <div class="sk-spinner sk-spinner-wandering-cubes">
                                        <div class="sk-cube1"></div>
                                        <div class="sk-cube2"></div>
                                    </div>
                                    <div class='row'>
                                        <div class=" col-lg-12 col-sm-12">
                                            <form method="POST"class='form-group' id="formScript"
                                                data-parsley-validate onsubmit="add('addscript','#formScript','#tab-script')" >
                                                @csrf
                                                <div class="row">
                                                    <div>
                                                        <input name="id" hidden
                                                            value="{{ isset($branche)?$branche->id:"" }}" />
                                                    </div>

                                                    <div class="col-sm-6 form-group ">
                                                        <label>Niveau</label>
                                                        <input type="tel" placeholder="Niveau " class="form-control"
                                                            name='niveau' required aria-required="true" 
                                                            value=""
                                                            data-parsley-minlength="1" data-parsley-trigger="change">
                                                            @error('niveau') <span class="error text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                    <div class="col-sm-6 form-group ">
                                                        <label>Titre</label>
                                                        <input type="text" placeholder="Titre " class="form-control"
                                                            name='titre' required aria-required="true"
                                                            data-parsley-minlength="2" data-parsley-trigger="change">
                                                            @error('titre') <span class="error text-danger">{{ $message }}</span> @enderror

                                                    </div>
                                                    
                                                    <div class=" col-sm-12 form-group">
                                                        <label>Description </label>
                                                        <textarea name="description" class="form-control" rows="6" cols="60"
                                                        wire:model="description">
                                                            {{ isset($branche)?$branche->description:"" }}
                                                </textarea>
                                                    </div>
                                                    <div class="col-lg-offset-3 col-lg-6 col-sm-12 form-group">

                                                        <div class="col-sm-offset-4 col-sm-5">
                                                            <button class="ladda-button btn btn-sm btn-primary"
                                                                type="submit">{{
                                                                isset($branche)?"Modifier":"Enregistrer" }}</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


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
</div>