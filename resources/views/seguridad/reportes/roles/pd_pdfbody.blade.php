{!! Html::style('css/pdf.css') !!}
<table style="width: 100%" border="0" cellspacing="0">
    <thead style="background-color: #C2E7FC;">
      <tr class="class="thead-dark"" role="alert">
          <th>Nombre</th>
          <th style="text-align: center;">Usuarios </th>
          <th style="text-align: center;">Permisos </th>
      </tr>
    </thead>
    <tbody>
      @foreach($roles as $role)
      <tr>
        <td>{{ $role->name }}</td>
        <td style="text-align: center;">{{$role->users->pluck('name')->implode(', ') }}</td>
        <td style="text-align: center;">{{ $role->todos != 0 ? 'Todos' : $role->permissions->pluck('display_name')->implode(', ') }}</td>
      </tr>
      @endforeach
    </tbody>
   </table>
