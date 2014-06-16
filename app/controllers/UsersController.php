<?php

class UsersController extends BaseController {

    public function getIndex()
    {
    	//Vamos a users con todos los datos de la BD.
    	$users= User::all();

        return View::make('users.index')->with('users',$users);

       // return 'esto es prueba';
    }
    	//Nos lleva a la view create, donde esta el formulario para crear usuario
    public function getCreate(){

    	 return View::make('users.create');
    }

    	//Recoge los datos del formulario y los guarda en la BD
    public function postCreate(){

    	$user = new User;//Creamos un objeto user y le guardamos los datos introducidos por el usuario

    	$user->name = Input::get('name');
    	$user->email = Input::get('email');
    	$user->password =Hash::make(Input::get('password')) ;//password encriptado

    	$user->save();
    	return Redirect::to('users');//Redireccionamos a la view users
    }

    //Borrar Usuarios
    public function getDelete($user_id){
    	$user=User::find($user_id);

    	if(is_null($user)){
    		return Redirect::to('users');//Redireccionamos a la view users
    	}
    	$user->delete();

    	return Redirect::to('users');//Redireccionamos a la view users

    }
    	//Actualizamos usuarios
     public function getUpdate($user_id){
    	$user = User::find($user_id);//Recupera el id del usuario

    	if(is_null($user)){//si user en null 
    		return Redirect::to('users');//Redireccionamos a la view users
    	}
    	
    	 return View::make('users.update')->with('user',$user);// Nos lleva a la view update con los datos

    }

    //
    public function postUpdate($user_id){
        $user=User::find($user_id);
        if(is_null($user)){
            return Redirect::to('users');
        }

        //Cargamos los datos en los input
        $user->name = Input::get('name');
        $user->email = Input::get('email');

        if(Input::has('password')){//Determinar si existe un valor de password
            $user->password = Hash::make(Input::get('password'));
        }

        $user->save();

        return Redirect::to('users');
    }




}