<div id="right-sidebar" class="animated">
    <div class="sidebar-container">

        <ul class="nav nav-tabs navs-3">

            <li class="active"><a data-toggle="tab" href="#tab-1">
                    SCRIPT
                </a></li>
            <li class=""><a data-toggle="tab" href="#tab-3">
                    Historique
                </a></li>
            <li><a data-toggle="tab" href="#tab-2">
                    Info
                </a></li>
        </ul>

        <div class="tab-content">
            <div id="tab-1" class="tab-pane active">
                <div class="sidebar-title">
                    <h3> <i class="fa fa-comments-o"></i>Ceci est votre scripte</h3>
                    <small><i class="fa fa-tim"></i> Bonjour Mme (Mr) je suis <b>{{ Auth::user()->name }}</b> de la
                        BGFI</small>
                </div>
                <ul class="sidebar-list">

                    @livewire('view-script')


                </ul>


            </div>

            <div id="tab-2" class="tab-pane">

               


            </div>

            <div id="tab-3" class="tab-pane">

                @livewire('journal')
               
            </div>
        </div>

    </div>



</div>