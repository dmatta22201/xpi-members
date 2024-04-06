{{--
*
* Represents a stylized input field for forms with combined label and input
* field.
*
--}}

{{--
   This seperates out the id and label field from attributes bag so we can
   apply all the other attributes to the input tag as appropriate.
--}}
@props([
    'id' => 'no-id',
    'label' => 'no-label',
])

<div class="md:flex md:items-center mb-6">
   <div class="md:w-1/5 lg:w-1/6">
      <label for="{{ $id }}"
         class="block text-gray-8 md:font-bold md:text-right mb-1 md:mb-0 pr-4">{{ $label }}</label>
   </div>
   <div class="md:w-4/5 lg:w-5/6">
      <input id="{{ $id }}"
         class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-800 leading-tight focus:outline-none focus:bg-white focuse:border-purple-500"
         {{ $attributes }} />
   </div>
</div>
