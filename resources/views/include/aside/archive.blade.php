<div class="p-4">
    <h4 class="fst-italic">Archives</h4>
    @php
        if (App\Models\Patronyme::count() > 10) {
            $patronymes = App\Models\Patronyme::orderBy('designation', 'asc')->get('designation')->random(10);
        } else {
            $patronymes = App\Models\Patronyme::orderBy('designation', 'asc')->get('designation');
        }
    @endphp
    <ol class="list-unstyled mb-0">
        @foreach ($patronymes as $patronyme)
            <li>
                <a href="{{ route('show-patronyme', $patronyme->designation) }}">
                    {{ $patronyme->designation }}
                </a>
            </li>
        @endforeach
    </ol>
</div>