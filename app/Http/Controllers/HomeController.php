<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        // echo "Hello Nani";
        // $data ['title'] = "Home Page";
        $data ['welcome'] = "Welcome to Laravel";
        $data ['fruits'] = ["Apple","Mengo","orage","Banana"];
        return view ('home');
    }

    public function about(){
        // $data ['title'] = "About Page";
        return view('about');
    }

    public function contact(){
        // $data ['title'] = "Contact Page";
        return view('Contact');
    }
    public function store(Request $request){
        $contact = new Contact();

        $message = [
            'name.required' => 'You have put your name',
            'email.required' => 'please put your email',
        ];

        $validate = $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required|min:20'
        ],$message);

        if($validate){
            $data = [
                'name' =>$request->name,
                'email' =>$request->email,
                'subject' =>$request->subject,
                'message' =>$request->message,
            ];
    
            $contact->insert($data);
            return redirect('contact')->with('msg', 'We received your message');
        } 
        
    //    echo $request->name . '<br>';
    //    echo $request->email . '<br>';
    //    echo $request->subject . '<br>';
    //    echo $request->message;
    }

    public function contactList(){
        $contact = Contact::all();
        $data['messages'] = $contact;
        return view('contactList', $data);
    }

    public function delete($id){
        echo $id;
        $contact = Contact::find($id);
        $contact->delete();
        return redirect('contact/list')->with('msg','Deleted Successfully');

    }

    public function edit($id){
        $contact = Contact::find($id);
        $data['single'] = $contact;
        return view('contact_edit',$data);
    }

    public function update(Request $request, $id){
        $contact = Contact::find($id);

        $message = [
            'name.required' => 'You have put your name',
            'email.required' => 'please put your email',
            'email.email' => 'please valid email',
        ];

        $validate = $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required|min:20'
        ], $message);

        if($validate){
            $data = [
                'name' =>$request->name,
                'email' =>$request->email,
                'subject' =>$request->subject,
                'message' =>$request->message,
            ];
    
            $contact->update($data);
            return redirect('contact/list')->with('msg', 'Updated your message');
        } 
    }
}
