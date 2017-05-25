<?php
/**
 * Created by PhpStorm.
 * User: CodeAcademy
 * Date: 5/25/2017
 * Time: 11:19 AM
 */

namespace App\Providers;

use App\Models\SocialAccountModel;
use App\User;
use Laravel\Socialite\Contracts\User as ProviderUser;
use Illuminate\Http\Request;


class SocialAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialAccountModel::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();

   //     if ($account) {
    //        return $account->user;
     //   } else {

          //  $account = new SocialAccountModel([
        //        'provider_user_id' => $providerUser->getId(),
      //          'provider' => 'facebook'
    //        ]);

       //     $user = User::whereEmail($providerUser->getEmail())->first();

        //    if (!$user) {
//
  //              $user = User::create([
    //                'email' => $providerUser->getEmail(),
      //              'name' => $providerUser->getName(),
        //        ]);
    //        }

     //       $account->user()->associate($user);
       //     $account->save();

      //      return $user;

//        }

    }
}