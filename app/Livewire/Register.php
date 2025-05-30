<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public $email;
    public $password;
    public $cpassword;

    public function register()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
            'cpassword' => 'required|same:password',
        ]);

        try {
            User::create([
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'user_role' =>'customer',
                
            ]);

            $this->resetVariables();
            return redirect()->route('/');
        } catch (Exception $e) {
            // Handle the exception (e.g., log it, display an error message)
            session()->flash('error', 'An error occurred during registration.'); // Example
        }
    }

    private function resetVariables()
    {
        $this->email = '';
        $this->password = '';
        $this->cpassword = '';
    }

    public function render()
    {
        return view('livewire.register');
    }
}
