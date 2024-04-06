{{--
    Primary Page Header.
--}}
<nav class="container flex w-screen items-center mt-4 gap-4 bg-xpi-green">

   <!-- Logo -->
   <div>
      <img src="/images/xpi-logo-128x128-bw.png" alt="logo" />
   </div>

   <!-- Company Name -->
   <div class="flex-1 text-lg">
      <p class='font-Amarante'>Xanodria Productions, Inc.</p>
   </div>

   <!-- Tagline -->
   <div class="hidden md:flex flex-1 text-lg">
      <p class='font-Amarante'>Adventurers Wanted...</p>
   </div>

   <!-- menu -->
   <div class="hidden sm:flex flex-1 justify-end items-center gap-8 text-gray-900 uppercase tx-xs">
      @if (!@isset($suppressNav))
         <x-common.nav-button route="{{ route('pub-home') }}">Login</x-common.nav-button>
         <x-common.nav-button route="{{ route('member.create') }}">Register</x-common.nav-button>
      @endif
   </div>

   <!-- mobile menu button -->
   <div class="flex sm:hidden flex-1 justify-end">
      <i class="txt-2xl fas fa-bars"></i>
   </div>
</nav>
