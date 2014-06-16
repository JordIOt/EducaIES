<h1>Actualizar Usuario</h1>

{{  Form::open() }}
Nombre: {{  Form::text('name', $user->name) }} <br>
Email: {{  Form::email('email', $user->email) }} <br>
Cambiar password: {{  Form::password('password') }} <br>

{{ Form::submit('Actualizar') }}


{{  Form::close() }}