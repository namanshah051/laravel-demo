<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\User;

/**
 * Class UserCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { store as traitStore; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation { update as traitUpdate; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user');
        CRUD::setEntityNameStrings('user', 'users');


        $this->crud->setColumns([
            [
                'label' => "Profile Pic", 
                'name' => "profile_pic",
                'type' => "image",
            ],
            [
                'label' => "Name", 
                'name' => "name",
                'type' => "text",
            ],
            [
                'label' => "Email", 
                'name' => "email",
                'type' => "text",
            ],
            [
                'label' => "Name", 
                'name' => "name",
                'type' => "text",
            ],
            [
                'label' => "Phone", 
                'name' => "phone",
                'type' => "text",
            ],
            [
                'label' => "Created At", 
                'name' => "created_at",
                'type' => "text",
            ],
       ]);

        // Fields
        $this->crud->addFields([
            [
                'label' => "Name", 
                'name' => "name",
                'type' => "text",
            ],
            [
                'label' => "Email", 
                'name' => "email",
                'type' => "text",
            ],
            [
                'label' => "Name", 
                'name' => "name",
                'type' => "text",
            ],
            [
                'label' => "Phone", 
                'name' => "phone",
                'type' => "text",
            ],
            [
                'label' => "Password", 
                'name' => "password",
                'type' => "password",
            ],
            [
                'label' => "Profile Image",
                'name' => "profile_pic",
                'type' => 'image',
                'crop' => true,
                'aspect_ratio' => 1,
            ],
        ]);
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('id');
        CRUD::column('name');
        CRUD::column('email');
        CRUD::column('phone');
        CRUD::column('profile_pic');
        CRUD::column('created_at');
        CRUD::column('updated_at');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(UserRequest::class);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    public function store()
    {
        $request = $this->crud->getRequest();
        $user = new User();
        $user->name = $request->name;
        $user->email      = $request->email;
        $user->phone      = $request->phone;

        $user->profile_pic = $request->profile_pic;
        $user->save();
        $user->roles()->sync(2); // staff member
        
        $this->send_mail($user->id);
        $this->crud->setSaveAction();
        \Alert::success("The user has been successfully added")->flash();
        return redirect(backpack_url('/user'));

    }

    public function update()
    {

        $request = $this->crud->getRequest();
        ini_set('max_execution_time', 3600);
        $data = $request->only(['name', 'phone', 'profile_pic']);
        $user = User::find($request->id);

        $user->name = $data['name'];
        $user->phone = $data['phone'];
        if (starts_with($data['profile_pic'], 'data:image')) {
            $user->profile_pic = $data['profile_pic'];
        }

        if ($request->input('password')) {
            $user->password = \Hash::make($request->input('password'));
        }

        $user->save();
        \Alert::success("The user has been successfully update")->flash();
        return redirect(backpack_url('/user'));

    }

    public function send_mail($id)
    {
        $usermail = User::where('id', $id)->first();
        $rand = str_random(8);

        $email = $usermail->email;

        User::where('id', $id)->update(['password' => \Hash::make($rand)]);
        $user['email'] = $usermail->email;
        $user['name'] = $usermail->name;
        //$user['password'] = '123456789';
        $user['password'] = $rand;

        \Mail::send('emails.email_welcome_singup', ['user' => $user], function ($message) use ($email) {
            $message->to($email)->subject("Larvel | Password");
        });

        return redirect()->back()->with('message', 'IT WORKS!');
    }

}
