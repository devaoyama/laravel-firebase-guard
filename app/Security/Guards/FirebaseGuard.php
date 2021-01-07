<?php

namespace App\Security\Guards;

use App\User;
use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;

class FirebaseGuard
{
    public function user(Request $request)
    {
        $token = $request->bearerToken();

        try {
            $verifiedToken = Firebase::auth()->verifyIdToken($token);
            $uid = $verifiedToken->claims()->get('sub');
            return User::firstOrCreate(['uid' => $uid]);
        } catch (\Exception $exception) {
            return null;
        }
    }
}
