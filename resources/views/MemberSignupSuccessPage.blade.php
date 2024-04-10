<x-layout>

   <!-- Contents -->
   <div class="container flex flex-col gap-8 py-4 mt-8">
      <h1 class="text-l sm:text-xl md:text-3xl">Success!</h1>
      <p>
         You have successfully registered as a member of Xanodria Productions, Inc. You should shortly receive an email.
         Once you confirm your email address, you will be allowed to sign in.
      </p>
      <p>
         If you do not receive an email in the next 12 hours or you have other questions, please email us at <a
            href="email:custcare@xanodria.com">custcare@xanodria.com</a>.
      </p>
      <x-common.nav-button route="{{ route('pub-home') }}">Return to Home Page</x-common.nav-button>
   </div>
</x-layout>
