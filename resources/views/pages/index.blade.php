@php
    /* @var \App\models\Page $page */
@endphp

<x-layouts.base title="{{ $page->title }}" wide="true">
    <main class="prose-headings:font-base">
        <x-flexible-hero :page="$page" />

        {!! tiptap_converter()->asHTML($page->intro, toc: true, maxDepth: 3) !!}

        <div class="prose content">
            <x-flexible-content-blocks :page="$page"/>
        </div>
    </main>
</x-layouts.base>
