<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UserCreateRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\Permissions;
use Illuminate\Support\Facades\Log;

class NewMemberController extends Controller
{
   /**
    * Show the new member form to create a new member.
    */
   public function create(): View
   {
      return view('MemberSignupPage');
   }

   /**
    * Store a new member in the database.
    */
   public function store(UserCreateRequest $request): RedirectResponse
   {
      /*
       * Note, incoming validation of data occurs in the UserCreateRequest class. We only get here once we know the data has passed
       * all validation checks.
       */
      $user = new User();
      $user->fname = $request->fname;
      $user->lname = $request->lname;
      $user->email = $request->email;
      $user->birthdate = $request->birthdate;
      $user->password = Hash::make($request->password);
      $user->role = Permissions::createRoleValue([]);

      $user->save();

      return redirect()->route('member.success');
   }

   /**
    * Shows a success message asking the user to check their email address for confirmation.
    */
   public function success(): View
   {
      return view('MemberSignupSuccessPage');
   }
}
