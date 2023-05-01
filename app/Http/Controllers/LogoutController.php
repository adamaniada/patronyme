<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\UserActivityLog;

class LogoutController extends Controller
{
    /**
     * disconnect logged user.
     */
    public function perForm(Request $request)
    {

        if(UserActivityLog::count() > 0)
        {
            $id = UserActivityLog::where('user_id', '=', auth::user()->id)->latest()->firstOrFail('id')->id;
            
            $activity = UserActivityLog::find($id);
            $activity->logout_at = now();
            $activity->update();
        }

        Session::flush();

        Auth::logout();

        return redirect()->route('login')->with('status', 'Vous etes deconnectez');
    }
}
