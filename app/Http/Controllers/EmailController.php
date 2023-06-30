<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\SendEmailEvent;
use App\Notifications\EmailNotification;
use App\Models\Notification;
use Illuminate\Support\Facades\Log;

class EmailController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function sendEmail(Request $request)
    {
        try
        {
            $validatedData = $this->validateEmailData($request);
            event(new SendEmailEvent($validatedData));

            Notification::create([
                'title' => 'Email Event',
                'data' => json_encode($validatedData),
            ]);
            return redirect()->back()->with('success', 'Email sent successfully.');
        }
        catch(\Exception $e){
            Log::error('Error sending email: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while sending the email.');
        }
    }

    private function validateEmailData(Request $request)
    {
        return $request->validate([
            'email' => 'required|email',
            'text' => 'required',
            'datetime' => 'required|date',
        ]);
    }
}
