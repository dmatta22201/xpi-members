<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Permissions
{
   use HasFactory, Notifiable;

   /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
   protected $fillable = [
      'permission',
      'x',
      'y',
   ];

   /**
    * The attributes that should be hidden for serialization.
    *
    * @var array<int, string>
    */
   protected $hidden = [
      'x',
      'y',
   ];

   /**
    * This function takes an array of permissions for the user and returns the
    * role value to be stored in the database for the user.
    */
   public static function createRoleValue(array $permissions): int
   {

      // Start with an X/Y array that has no permissions.
      $pMatrix = [
         [0, 0, 0, 0],
         [0, 0, 0, 0],
         [0, 0, 0, 0],
         [0, 0, 0, 0]
      ];

      // For each permission passed it, find it's corresponding X/Y coordinate
      // listed in the database and then set the value in the matrix to 1.
      // Disregard permissions we don't know about.
      foreach ($permissions as $permission) {
         $permissionDBEntry = DB::table('permissions')->where('permission', '=', $permission)->first();
         if ($permissionDBEntry != null) {
            $pMatrix[$permissionDBEntry->x][$permissionDBEntry->y] = 1;
         }
      }

      // Start role at 1 (first bit is always set).
      $role = 1;
      $role = $role << 1;

      // First 4 bits (X=0) are noise. Note we start at the second bit b/c we
      // set the first bit to always be 1.
      for ($i = 1; $i < 4; $i++) {
         $role += rand(0, 1);
         $role = $role << 1;
      }

      // Second 4 bits (X=0) are permissions
      for ($i = 0; $i < 4; $i++) {
         $role += $pMatrix[0][$i];
         $role = $role << 1;
      }

      // Third 4 bits (X=1) are  permissions
      for ($i = 0; $i < 4; $i++) {
         $role += $pMatrix[1][$i];
         $role = $role << 1;
      }

      // Fourth 4 bits (X=1) are random
      for ($i = 0; $i < 4; $i++) {
         $role += rand(0, 1);
         $role = $role << 1;
      }

      // Fifth 4 bits (X=2) are specific permissions
      for ($i = 0; $i < 4; $i++) {
         $role += $pMatrix[2][$i];
         $role = $role << 1;
      }

      // Sixth 4 bits (X=2) are random
      for ($i = 0; $i < 4; $i++) {
         $role += rand(0, 1);
         $role = $role << 1;
      }

      // Seventh 4 bits (X=3, Y=0..3) are random
      for ($i = 0; $i < 4; $i++) {
         $role += rand(0, 1);
         $role = $role << 1;
      }

      // Eighth 4 bits (X=3) are specific permissions
      for ($i = 0; $i < 4; $i++) {
         $role += $pMatrix[3][$i];
         if ($i != 3) {
            $role = $role << 1;
         }
      }

      // Return the value of role to be stored.
      return $role;
   }

   /**
    * This function takes in the role value and the name of a permission
    * and returns true or false depending on if the user has that permission.
    */
   public static function checkPermission($permission, $role): bool
   {

      // Assume they don't have the role.
      $result = false;

      // Get the X/Y values for the permission for the database. If no role
      // matches, skip computation and just return false.
      $permissionDBEntry = DB::table('permissions')->where('permission', "=", $permission)->first();

      if ($permissionDBEntry != null) {
         // Get the X/Y values from the database.
         $x = $permissionDBEntry->x;
         $y = $permissionDBEntry->y;

         // Compute the bit position for the permission based on the x/y values.
         $mask = 0;
         $bitPosition = $mask << (8 * $x);
         if (($x == 0) || ($x == 3)) {
            $bitPosition += 4;
         }
         $bitPosition += $y;

         // Create a mask where only the permission bit we are interested in is
         // set.
         for ($i = 0; $i < 32; $i++) {
            if ($i == $bitPosition) {
               $mask += 1;
            }
            if ($i != 31) {
               $mask = $mask << 1;
            }
         }

         // And the role with the mask. This sets all bits to 0 except for the
         // permission bit, which retains its value from role. If we end
         // up with the value > 0, the permission bit is set.
         $result = ($role & $mask) > 0 ? true : false;
      }

      return $result;
   }
}
