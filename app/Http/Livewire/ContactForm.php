<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Contact;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $body;

    public function submit()
    {
    	$validateData = $this->validate([
    		'name' => 'required|min:6',
    		'email' => 'required|email',
    		'body' => 'required',
    	]);

    	Contact::create($validateData);
    	return redirect()->to('/form');
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
