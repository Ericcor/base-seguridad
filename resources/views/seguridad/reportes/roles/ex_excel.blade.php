<table>
 <tr>
    <th colspan="6" style="text-align: center;">ROLES</th>
</tr>
<tr>
<th colspan="1" style="text-align: center;">FECHA  {{Date::now()->format('d-m-Y')  }} </th>
  </tr>
 
</table >
<table >
  <tr style="background-color: #C2E7FC">
    <th>Nombre</th>
    <th>Usuarios </th>
    <th>Permisos </th>
   
  </tr>
  <tbody>
    @foreach ($roles as $role)
    <tr>
      <td>{{ $role->name }}</td>
      <td>{{$role->users->pluck('name')->implode(', ') }}</td>
      <td>{{ $role->todos != 0 ? 'Todos' : $role->permissions->pluck('display_name')->implode(', ') }}</td>
     
    </tr>
    @endforeach
  </tbody>
</table>