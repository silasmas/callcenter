<div>
    @forelse ($script as $s)
    <li>
        <a href="#">
            
            <h4>{{ $s->niveau.'/  '.$s->titre }}</h4>
            {!! $s->description!!}
            
        </a>
    </li>
   
    @empty
        <span class="text-danger">Pas des script disponible</span>
    @endforelse
   
</div>
