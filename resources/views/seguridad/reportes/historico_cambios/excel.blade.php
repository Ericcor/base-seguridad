<table>
  <tr>
   <th colspan="6" style="text-align: center;">HISTÓRICO DE CAMBIOS</th>
  </tr>
   <tr>
   <th colspan="1" style="text-align: center;">FECHA  {{Date::now()->format('d-m-Y')  }} </th>
  </tr>

   
  </tr>
</table >
<table >
  <tr style="background-color: #C2E7FC">
    <th>Nombre del usuario</td>
    <th>Correo del usuario</td>
    <th>Fecha</td>
    <th>IP</td>
    <th>Acción</td>
    <th>Ruta</td>
    <th>Registro anterior</td>
    <th>Nuevo registro</td>
  </tr>
  <tbody>
    @foreach ($logs as $log)
    <tr>
      <td>{{ $log->username }}</td>
      <td>{{ $log->user_email }}</td>
      <td>{{ $log->created_at }}</td>
      <td>{{ $log->ip_address }}</td>
      <td>{{ $log->event }}</td>
      <td>{{ $log->url }}</td>
      <td>{{ $log->old_values }}</td>
      <td>{{ $log->new_values }}</td>
    </tr>
    @endforeach
  </tbody>
</table>