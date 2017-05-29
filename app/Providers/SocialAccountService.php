<?php
/**
 * Created by PhpStorm.
 * User: CodeAcademy
 * Date: 5/25/2017
 * Time: 11:19 AM
 */

namespace App\Providers;


use App\Models\SocialAccountModel;
use App\Models\VRUsers;
use App\User;
use Laravel\Socialite\Contracts\User as ProviderUser;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class SocialAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialAccountModel::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialAccountModel([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);

            $user = VRUsers::whereEmail($providerUser->getEmail())->first();

            if (!$user) {

                $user = VRUsers::create([
                    'id' => uuid::uuid4(),
                    'email' => $providerUser->getEmail(),
                    'first_name' => $providerUser->getName(),
                    'last_name' => $providerUser->getNickname(),
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }
}