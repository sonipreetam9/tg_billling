<?php

namespace App\Http\Controllers;

use App\Models\CustomerModel;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function add_customer()
    {
        $customers = CustomerModel::orderBy('id', 'desc')->limit(10)->get();
        return view('software.add_customers');
    }
    public function all_customer()
    {
        $customers = CustomerModel::orderBy('id', 'desc')->get();
        return view('software.all_customers', compact('customers'));
    }
    public function add_customer_post(Request $request)
    {
        // वेलिडेशन पहले करें
        $request->validate(
            [
                "name" => ['required', 'regex:/^[a-zA-Z\s]+$/'],
                "business_name" => ['required', 'regex:/^[a-zA-Z0-9\s]+$/'],
                "email" => 'required|email',
                "phone" => ['required', 'digits:10'],
                "city" => ['required', 'regex:/^[a-zA-Z\s]+$/'],
                "state" => ['required', 'regex:/^[a-zA-Z\s]+$/'],
                "country" => ['required', 'regex:/^[a-zA-Z\s]+$/'],
                "pin_code" => ['required', 'digits:6'],
                "gst_number" => ['nullable', 'regex:/^[0-9A-Z]{15}$/'],
                "address" => ['required', 'regex:/^[^@#\$%\"!\(\)_{}\[\]\\?]+$/'],
            ],
            [
                'phone.digits' => 'Phone number must be exactly 10 digits.',
                'pin_code.digits' => 'Pin code must be exactly 6 digits.',
                'gst_number.regex' => 'GST number must be 15 characters: only uppercase letters and digits.',
                'address.regex' => 'Address should not contain special characters like @, #, $, %, ", !, (, ), _, {}, [], \ or ?',
            ]
        );

        try {
            // Customer save करें
            $customer = CustomerModel::create([
                "name" => $request->name,
                "business_name" => $request->business_name,
                "email" => $request->email,
                "phone" => $request->phone,
                "city" => $request->city,
                "state" => $request->state,
                "country" => $request->country,
                "pincode" => $request->pin_code,
                "gst_number" => $request->gst_number ?? 0,
                "address" => $request->address
            ]);

            // tag_id update करें
            $tag_id = "#TG-00" . $customer->id;
            $customer->update([
                "tag_id" => $tag_id
            ]);

            return redirect()->route('add.customer')->with('success', 'Customer Added Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage())->withInput();
        }
    }



     public function get_customer(Request $request)
    {
        $tagId = $request->customer_tag;

        $customer = CustomerModel::where('tag_id', $tagId)->first();

        if (!$customer) {
            return response()->json(['error' => 'Customer not found'], 404);
        }

        return response()->json([
            'name' => $customer->name,
            'phone' => $customer->phone,
            'email' => $customer->email,
            'joining_date' => $customer->created_at->format('d M Y'),
            'business_name' => $customer->business_name,
            'gst_number' => $customer->gst_number,
            'location' => $customer->city . ', ' . $customer->state . ', ' . $customer->country,
        ]);
    }

}
