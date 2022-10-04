<div>
    <div class="ibox-content  " wire:loading.class='sk-loading'>
        <div class="sk-spinner sk-spinner-wandering-cubes">
            <div class="sk-cube1"></div>
            <div class="sk-cube2"></div>
        </div>
        <div class="col-sm-4 form-group ">
            <label>Satut 1 </label>
            <select name="statut" id="statut" class="form-control select2" onchange="select(this.value)"
            required wire:model.defer='statut'>
                <option value=" " disabled selected> --Selectionez un
                    statut--</option>
                @forelse ($statu as $s)
                <option value="{{ $s->id }}">{{ $s->titre }}</option>
                @empty

                @endforelse
            </select>
        </div>
        @if(!is_null($libelle) )
        @if(count($libelle)>0)
        <div class="col-sm-4 form-group d-none">
            <label>Libelle</label>
            <select name="libelle" id="libelle" class="form-control select2" required wire:model.defer='libelle'>
                <option value="" disabled selected> --Selectionez un
                    statut-- </option>
                @forelse ($libelle as $s)
                <option value="{{ $s->description }}">{{ $s->description }}
                </option>
                @empty
                <option value="" disabled> Ce statut n'a pas des libelle
                </option>
                @endforelse
            </select>
        </div>
        @endif
        @endif

    </div>
</div>
@section('autres-script')
<script>
    function select(id){
        var $state = $('#libelle');
        @this.selectstatut=id;
            // $.ajax({
            //     url: "statut",
            //     data: {
            //        stat_id: id
            //     },
            //     success: function (data) {
            //         console.log(data)
            //         @this.libelle=data;
            //         $state.html('<option value="" disabled selected> --Selectionez un statut-- </option>');
            //         $.each(data, function (id, value) {
            //             $state.append('<option value="' + id + '">' + value.description + '</option>');
            //         });
            //     }
            // });
    }
</script>
@endsection