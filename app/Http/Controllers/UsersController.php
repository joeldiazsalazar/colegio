<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UpdateUserRequest;

use App\User;

class UsersController extends Controller
{
   public function __construct()
    {
        $this->middleware('guest',['except' => ['show','create','store','edit','update']]);
        $this->middleware('roles:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //return view('admin.index');
    }



    public function create()
    {
       return  view('auth.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Guadar mensaje
        /*DB::table('mensajes')->insert([

            "nombre" => $request->input('nombre'),
            "email" => $request->input('email'),
            "mensaje" => $request->input('mensaje'),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),

        ]);*/

       User::create($request->all());


        // Redireccionar mensaje
        return redirect()->route('users.create')->with('info','Hemos recibido tu mensaje');   
    
    }

      public function show()
    {

        //$consulta = DB::table('mensajes')->where('id', $id)->first();
       
        $users = User::all();

        return view('auth.show',compact('users'));

    }


        public function edit($id)
    {

        $user = User::findOrFail($id);
        return view('auth.edit',compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {

         $user = User::findOrFail($id);
        $user->update($request->all());
        return back()->with('info','usuario actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
