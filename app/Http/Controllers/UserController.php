<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;
use Response;
use App\Http\Requests;
use App\User;
class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users=User::all();

        return view('page.user')->with(compact('users'));;
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
      public function store(Request $request )
    {
        //

//return  $request->userName;
     $id= New User; 
    $id->name = $request->userName;
   $id->email = $request->userEmail;
  $id->admin = $request->userAdmin;
  $stat=$id->save();
  if($stat==true){
    return Response::json ("ok");
  }else{
    return Response::json("failed");
  }
 //return Response::json($stat);
  //return "insert";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

   

        $tampil =User::findorFail($id);
        return Response::json($tampil);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit (Request $request , $id)
    {
        //
         $id = User::findOrFail($id);

    $id->name = $request->userName;
   $id->email = $request->userEmail;
  $id->admin = $request->userAdmin;
   $id->save();
    return Response::json($id );
  //return $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
        $id = App\User::find(1);

        $id->delete();
         return Response::json($id);
    }
}
