<!-- if message is passed (with redirect in ListingController::store) -->
@if(session()->has('message'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show"
  class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-48 py-3 border-2 border-gray-800">
  <p>
    {{session('message')}}
  </p>
</div>
@endif
