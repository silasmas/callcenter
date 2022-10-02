<div id="tab-libelle">
    <div class="ibox-content">
        <div class="sk-spinner sk-spinner-wandering-cubes">
            <div class="sk-cube1"></div>
            <div class="sk-cube2"></div>
        </div>
        <div class='row'>
            
            <div class=" col-lg-12 col-sm-12">
                <form method="POST" id="formLibelle" action="" class='form-group' data-parsley-validate
                onsubmit="add('addlibelle','#formLibelle','#tab-libelle')">
                    @csrf
                    <div class="row">
                        <div>
                            <input name="id" hidden value="{{ isset($branche)?$branche->id:"" }}" />
                        </div>

                        <div class="col-sm-6 form-group ">
                            <label>Satut</label>
                            <select name="ids" id="" class="select2 form-control">
                                <option disabled selected> --Selectionez un statut--
                                </option>
                                @forelse ($statu as $s)
                                <option value="{{ $s->id }}">{{ $s->titre }}</option>
                                @empty

                                @endforelse
                            </select>
                        </div>
                        <div class=" col-sm-12 form-group">
                            <label>Description </label>
                            <textarea name="description" class="" rows="12" cols="60"
                                required aria-required="true" >
                                                            {{ isset($branche)?$branche->description:"" }}
                                                </textarea>
                        </div>

                        <div class="col-lg-offset-3 col-lg-6 col-sm-12 form-group">
                            <div class="col-sm-offset-4 col-sm-5">
                                <button class="ladda-button btn btn-sm btn-primary" type="submit">{{
                                    isset($branche)?"Modifier":"Enregistrer" }}</button>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>