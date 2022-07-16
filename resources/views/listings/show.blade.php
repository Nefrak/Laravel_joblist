<!-- Show single listing inside component layout -->
<x-layout>
    <a href="/" class="inline-block text-black ml-4 mb-4"
        ><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <x-card class="p-10">
            <div class="flex flex-col items-center justify-center text-center">
                <img class="w-48 mr-6 mb-6" src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png')}}" alt=""/>

                <h3 class="text-2xl mb-2">{{$listing['title']}}</h3>
                <div class="text-xl font-bold mb-4">{{$listing['company']}}</div>
                <x-ListingTags :tagsCsv="$listing['tags']"/>
                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i> {{$listing['location']}}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Job Description
                    </h3>
                    <div class="text-lg space-y-6">
                        {{$listing['description']}}

                        <a href="mailto:{{$listing['email']}}" class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80">
                            <i class="fa-solid fa-envelope"></i>
                            Contact Employer
                        </a>

                        <a href="{{$listing['website']}}" target="_blank" class="block bg-black text-white py-2 rounded-xl hover:opacity-80">
                            <i class="fa-solid fa-globe"></i>
                            Visit Website
                        </a>
                    </div>
                </div>
            </div>
        </x-card>

        @auth
        <x-card class="mt-4 p-2 space-x-6 text-center h-100 d-flex align-items-center justify-content-center">
            <form method="POST" action="/messages">
                @csrf

            <input type="hidden" name="listing_id"  value="{{$listing->id}}">

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">
                    Contact Email
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{$email}}" />

                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="content" class="inline-block text-lg mb-2">
                    Content
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="content" rows="10"
                    placeholder="Include tasks, requirements, salary, etc">{{old('content')}}</textarea>

                @error('content')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

                <button class="text-gray-800"><i class="fa-solid fa-envelope fa-xl"></i> Send</button>
            </form>
        </x-card>

        <x-card class="mt-4 p-2 flex text-center space-x-6">
            <a href="/listings/{{$listing->id}}/edit">
                <i class="fa-solid fa-pencil"></i> Edit
            </a>
        </x-card>

        <x-card class="mt-4 p-2 d-flex space-x-6 flex text-center">
            <form method="POST" action="/listings/{{$listing->id}}">
                @csrf
                @method('DELETE')
                <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
            </form>
        </x-card>
        @endauth
    </div>
</x-layout>
