
	<h1>Usuarios</h1>

	@if($users)
	<ul>
		@foreach($users as $user)
			<li>Nombre: {{ $user->name }}--- Email: {{ $user->email }} {{link_to('users/delete/'.$user->id, 'Borrar')}} {{link_to('users/update/'.$user->id, 'Actualizar')}}</li>
		@endforeach

	</ul>
		


	@else
		Todavia no hay ningun usuario registrado.

	@endif	

	{{link_to('users/create', 'Crear Usuario')}}
