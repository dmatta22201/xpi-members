<div class="container flex flex-col gap-8 py-4 mt-8 w-full">
   <h1 class="text-l sm:text-xl md:text-3xl">New Member Registration</h1>

   @if ($errors->any())
      <div class="w-full max-width-md bg-red-300 text-red800">
         <ul>
            @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
            @endforeach
         </ul>
      </div>
   @endif

   <form method="POST" action="{{ route('member.store') }}" class="w-full max-width-md">
      @csrf
      <x-common.form-input id="fname" name="fname" label="First Name" type="text" maxlength="50" />
      <x-common.form-input id="lname" name="lname" label="Last Name" type="text" maxlength="50" />
      <x-common.form-input id="email" name="email" label="Email" type="text" maxlength="255" />
      <x-common.form-input id="birthdate" name="birthdate" label="Birthdate (mm/dd/yyyy)" type="text"
         maxlength="10" />
      <x-common.form-input id="password" name="password" label="Password" type="password" maxlength="24" />
      <x-common.form-input id="password_confirmation" name="password_confirmation" label="Confirm Password"
         type="password" maxlength="24" />

      <div class="md:flex md:items-center mb-6">
         <div class="md:w-1/5 lg:w-1/6"></div>
         <div class="md:w-4/5 lg:w-5/6">
            <p class="text-red-800">While we welcome all interested persons to sign up, you must be at least 18 years
               old to participate in any XPI event.</p>
         </div>
      </div>

      <div class="md:flex md:items-center mb-6">
         <div class="md:w-1/5 lg:w-1/6"></div>
         <div class="md:w-4/5 lg:w-5/6">
            <button type="submit"
               class="bg-xpi-olive text-white rounded-md px-5 py-2 uppercase hover:bg-xpi-white hover:text-black">Submit</button>
         </div>
      </div>
   </form>
</div>
