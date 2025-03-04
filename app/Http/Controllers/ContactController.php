<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactModel;


class ContactController extends Controller
{
    public function index()
    {
        return view("contact");
    }

    public function get_all_contacts()
    {
        $all_contacts = ContactModel::all();
        return view("all_contacts", compact('all_contacts'));
    }

    public function sendContact(Request $request)
    {
        $request->validate([
            "email" => "required|string",
            "subject" => "required|string",
            "description" => "required|string|min:5"
        ]);


        echo "Email: ".$request->get("email")." Naslov: ".$request->get("subject")." Poruka:" .$request->get("description");

        ContactModel::create([
            "email" => $request->get("email"),
            "subject" => $request->get("subject"),
            "message" => $request->get("description")
        ]);

        return redirect("/shop");
       
    }

    public function delete($contact)
    {
        $single_contact = ContactModel::where(['id' => $contact])->first();

        if($single_contact === null)
        {
            die("THIS CONTACT DOES NOT EXIST!");
        }
        else
        {
            $single_contact->delete();
        }

        return redirect()->back();
    }
}
