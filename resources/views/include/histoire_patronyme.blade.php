<p>
    @php
        $array = array();
        if(strlen($patronyme->histoire) > 300){
            for ($i=0; $i < 300 ; $i++) {
                array_push($array, $patronyme->histoire[$i]);
            }
        }
        $newString = implode($array)
    @endphp

    @if(strlen($patronyme->histoire) < 300)
        {{ $patronyme->histoire }}
    @else
        {{ $newString }}
        <a href="{{ route('show-patronyme', $patronyme->designation) }}" class="btn btn-sm btn-outline-secondary">Lire plus</a>
    @endif
</p>