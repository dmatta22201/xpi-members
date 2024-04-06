<div class="container flex flex-col gap-8 py-4 mt-8 w-full">
   <h1 class="text-l sm:text-xl md:text-3xl">New Member Registration</h1>
   <form method="post" action="{{ route('member.create') }}" class="w-full max-width-md">
      <x-common.form-input id="fname" label="First Name" type="text" maxlength="50" />
      <x-common.form-input id="lname" label="Last Name" type="text" maxlength="50" />
      <x-common.form-input id="email" label="Email" type="text" maxlength="244" />
      <x-common.form-input id="birthdate" label="Birthdate (m/d/yyyy)" type="text" maxlength="244" />

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
