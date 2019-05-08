<table>
  
  <tr>
   <th colspan="6" style="text-align: center;">USUARIOS</th>
  </tr>
   <tr>
   <th colspan="1" style="text-align: center;">FECHA  {{Date::now()->format('d-m-Y')  }} </th>

  </tr>


</table >
<table >
  <tr style="background-color: #C2E7FC">
    <th>Nombre</th>
    <th>Email</th>
    <th>Roles</th>
    <th>Estado</th>
  </tr>
  <tbody>
    @foreach ($usuarios as $usuario)
    <tr>
      <td>{{ $usuario->name }}</td>
      <td>{{ $usuario->email }}</td>
      <td>{{ $usuario->roles()->pluck('name')->implode(', ') }}</td>
           <?php $status = $usuario->status == 1 ? ['Activo', ''] : ['Inactivo', 'default']; ?>
              <?php $status = $usuario->deleted_at != null ? ['Eliminado', ''] : $status; ?>
          <td style="text-align: center;"><span class="label label-{{ $status[1] }}">{{ $status[0] }}</span></td>
      </tr>
    </tr>
    @endforeach
  </tbody>
</table>