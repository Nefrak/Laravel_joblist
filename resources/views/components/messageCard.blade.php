<!-- message component showing single message in messages -->
@props(['message'])
<x-card>
    <div class="flex">
       <div>
            <h3 class="text-2xl">
                <a href="mailto:{{$message['email']}}">Email: {{$message['email']}}</a>
            </h3>
            <br>
            <div class="mb-6">
            <h3 class="text-2xl mb-2"><a href="/listings/{{$message['listing_id']}}">Title: {{$message['title']}}</a></h3>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="content" rows="10" readonly>{{$message['content']}}</textarea>
            </div>
        </div>
    </div>
</x-card>
