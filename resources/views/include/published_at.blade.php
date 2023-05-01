<p class="blog-post-meta text-end">
    {{ \Carbon\Carbon::parse($patronyme->created_at)->formatLocaliZed('%B') }} 
    {{ \Carbon\Carbon::parse($patronyme->created_at)->formatLocaliZed('%d') }}, 
    {{ \Carbon\Carbon::parse($patronyme->created_at)->formatLocaliZed('%Y') }}
    par <a href="#">{{ $patronyme->name }}</a>
</p>