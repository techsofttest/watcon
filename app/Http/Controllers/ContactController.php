<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SeoMeta;

use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {

    $data['seo'] = SeoMeta::find(4);

    return view('pages.contact',$data);

    }



     public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email'    => 'required|email',
            'phone'    => 'required|string|max:20',
            'message'  => 'nullable|string',
        ]);

        // Prepare the email content
        $html = "
           <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f8f9fa;'>
        <div style='background-color: #ffffff; border-radius: 8px; padding: 30px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);'>
            <h2 style='color: #dc3545; margin-top: 0; margin-bottom: 24px; font-size: 24px; border-bottom: 3px solid #dc3545; padding-bottom: 12px;'>New Enquiry</h2>
            
            <div style='margin-bottom: 16px;'>
                <p style='margin: 0 0 4px 0; color: #6c757d; font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;'>Name</p>
                <p style='margin: 0; color: #212529; font-size: 16px; font-weight: 500;'>{$request->name}</p>
            </div>
            
            <div style='margin-bottom: 16px;'>
                <p style='margin: 0 0 4px 0; color: #6c757d; font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;'>Email</p>
                <p style='margin: 0; color: #212529; font-size: 16px;'>{$request->email}</p>
            </div>
            
            <div style='margin-bottom: 16px;'>
                <p style='margin: 0 0 4px 0; color: #6c757d; font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;'>Phone</p>
                <p style='margin: 0; color: #212529; font-size: 16px;'>{$request->phone}</p>
            </div>
            
            <div style='margin-bottom: 16px;'>
                <p style='margin: 0 0 4px 0; color: #6c757d; font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;'>Message</p>
                <p style='margin: 0; color: #212529; font-size: 16px; line-height: 1.6;'>{$request->message}</p>
            </div>
           
        </div>
        
        <div style='text-align: center; margin-top: 20px; padding: 12px; color: #6c757d; font-size: 12px;'>
            <p style='margin: 0;'>This is an automated email. Please do not reply.</p>
        </div>
    </div>
        ";

        // Send the email
        Mail::html($html, function ($message) use ($request) {
            $message->to(env('techsofttest@gmail.com'))
                    ->subject('New Enquiry from ' . $request->name);
                   
        });

        return back()->with('success', 'Your application has been sent successfully!');
    }




}
