<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lead;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\ThankYouEmail;

class LeadController extends Controller
{
    public function store(Request $request){
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'message' => 'required|max:60000'
        ]);

        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        };

        $new_lead = new Lead();
        $new_lead->fill($data);
        $new_lead->save();

        Mail::to($data['email'])->send(new ThankYouEmail());

        return response()->json([
            'success' => true
        ]);
    }
}
