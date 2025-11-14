<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verify(Request $request, $id, $hash){
        $user = User::findOrFail($id);

        if(!hash_equals((string) $hash, sha1($user->email))){
            return response()->json(['message'=>'Invalid Verification link.'], 403);
        }

        if($user->hasVerifiedEmail()){
            return response()->json(['Message'=>'Email is already verified.'], 200);
        }

        $user->markEmailAsVerified();
        event(new Verified($user));

        $user->is_active = 1;
        $user->save();
        // return response()->json([
        //     'message'=>'Email Verified Successfully'
        // ], 200);
        return redirect('http://localhost:5173/email-verified');
    }
}
