<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequestValidation;
use App\Http\Requests\EditRequestValidation;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class contactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Contact $contactAuth)
    {
        $contactos = DB::table('contacts')->get();
        //
        return view('contactos.index')
        ->with(compact('contactos'))
        ->with(compact('contactAuth'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Contact $contact)
    {
        $this->authorize('create',$contact);
        
        // $contactos = Contact::get();
        $this->authorize('create',$contact);
        $contactos = DB::table('contacts')->first();

        return view('contactos.create',compact('contactos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequestValidation $request,Contact $contact)
    {
        //
        $this->authorize('edit',$contact);



        // Eloquent
        // Contact::create($request->all());

        // Row
        // $user_id = $request->user()->id;
        // $name = $request->name;
        // $age = $request->age;
        // $bornDate = $request->bornDate;
        // $description = $request->description;
        // $gender = $request->gender;
        // $select = $request->select;
        // $agrement = $request->agrement;
        // DB::insert("insert into contacts (name, age, bornDate, description, gender, select, agrement,user_id)
        //         values ($name, $age, $bornDate, $description, $gender, $select, $agrement,$user_id)");
        

        //Query Builder

        $data = [
            'name' => $request->name,
            'age' => $request->age,
            'bornDate' => $request->bornDate,
            'description' => $request->description,
            'gender' => $request->gender,
            'select' => $request->select,
            'agrement' => $request->agrement,
            'userProfile' => $request->file('userProfile')->store('public/img')
        ];

        // if($request->hasFile('userProfile')){

        //     $img_create = ['userProfile' => $request->file('userProfile')->store('public/img')];
        //     $data_img = array_merge($data, $img_create);
        //     DB::table('contacts')->insert($data_img);
        // }else{
            DB::table('contacts')->insert($data);
        // }
        return redirect('dashboard')->with('status','has been created successfully.');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contactAuth,$id)
    {
        // $contacto = DB::table('contacts')->get();
        $contacto = Contact::find($id);

        return view('contactos.show')
            ->with(compact('contacto'))
            ->with(compact('contactAuth'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact, $id)
    {

        $this->authorize('edit',$contact);

        $contactos = Contact::find($id);
        return view('contactos.edit',compact('contactos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequestValidation $request, Contact $contact ,$id)
    {
        $this->authorize('update',$contact);
        $contactos = Contact::find($id);
        $data = [
                'name' => $request->name,
                'age' => $request->age,
                'bornDate' => $request->bornDate,
                'description' => $request->description,
                'gender' => $request->gender,
                'select' => $request->select,
                'agrement' => $request->agrement,
            ];
            
            if ($request->file('userProfile') == null) {
                $actual_img = ['userProfile' => $contactos->userProfile];
                $data_img = array_merge($data, $actual_img);
                $contactos->update($data_img);
            }else{
                $img_update = ['userProfile' => $request->file('userProfile')->store('public/img')];
                $data_img = array_merge($data, $img_update);
                $contactos->update($data_img);
            }
        return redirect('dashboard')->with('status','Updated successfully.');
    }











    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact, $id)
    {

        $this->authorize('delete',$contact);
        $contacto_to_delete = Contact::find($id);
        $contacto_to_delete->delete();
        return redirect('dashboard')->with('status','Deleted Successfully');


    }
}