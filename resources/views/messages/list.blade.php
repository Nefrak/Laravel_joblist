<!-- Show all messages using component messageCard inside component layout -->
<x-layout>
    @if (!Auth::check())
        @include('partials._hero')
    @endif

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @unless(count($messages) == 0)

        @foreach($messages as $message)
        <x-messageCard :message="$message" />
        @endforeach

        @else
        <p>No messages found</p>
        @endunless
    </div>
    <!-- link to another 'page' of messages (php artisan vendor:publish for styles then change in app) -->
    <div class="mt-6 p-4">
        {{$messages->links()}}
    </div>
</x-layout>
