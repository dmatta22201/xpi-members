{{--
    A common button used for navigation.
--}}
<a href="{{ $route }}">
   <div class="bg-xpi-olive text-white rounded-md px-5 py-2 uppercase hover:bg-xpi-white hover:text-black">
      {{ $slot }}
   </div>
</a>
