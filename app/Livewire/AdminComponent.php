<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class AdminComponent extends Component
{
    public $name, $email, $password,$password_confirmation, $user;
    public $role; // Selected role
    public $permissions = []; // Selected permissions
    public $users = [];
    public $allRoles = []; // All roles from the database
    public $allPermissions = []; // All permissions from the database

    protected $rules = [
        'name' => 'required|string|min:3|max:50|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
    ];

    public function render()
    {
        return view('livewire.admin-component');
    }

    public function mount(){

        $this->users=User::all();
        $this->allRoles = Role::all(); // Fetch all roles
        $this->allPermissions = Permission::all(); // Fetch all permissions
    }

    public function save(){
      
        try {
            
            $this->validate();

          $this->user =  User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);


             // Assign role to the newly created user
            if (!empty($this->role)) {
                $this->user->assignRole($this->role);
            }
                //Assign permission to new created user
            if (!empty($this->permissions)) {
                $this->user->syncPermissions($this->permissions);
            }
            $this->mount();


            session()->flash('message', 'User created successfully.');
            
             //clear user input after submit the form
            $this->name = "";
            $this->email = "";
            $this->password = "";
            $this->password_confirmation = "";

        } catch (\Throwable $th) {
            //throw $th;

            session()->flash('error', 'An error occurred: ' . $th->getMessage());
        }
    }
}
