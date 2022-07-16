<!-- Show all (searched) listings using component listingCard inside component layout -->
<x-layout>
    @if (!Auth::check())
        @include('partials._hero')
    @endif

    @include('partials._search')
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @unless(count($listings) == 0)

        @foreach($listings as $listing)
        <x-listingsCard :listing="$listing" />
        @endforeach

        @else
        <p>No listings found</p>
        @endunless
    </div>
    <!-- link to another 'page' of listings (php artisan vendor:publish for styles then change in app) -->
    <div class="mt-6 p-4">
        {{$listings->links()}}
    </div>
</x-layout>