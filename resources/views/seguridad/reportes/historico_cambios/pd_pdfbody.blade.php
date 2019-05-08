{!! Html::style('css/pdf.css') !!}
<table border="0" width="100%" cellspacing="0" cellpadding="5">
    <thead style="background-color: #C2E7FC;">
    <tr>
      <th>Usuario</th>
      <th>Fecha</th>
      <th>IP</th>
      <th>Acción</th>
      <th>Ruta</th>
    </tr>
    </thead>
    <tbody>
      @foreach ($logs as $log)
      <tr>
        <td>{{ $log->username }}</td>
        <td>{{ $log->created_at }}</td>
        <td>{{ $log->ip_address }}</td>
        <td>{{ $log->event }}</td>
        <td>{{ $log->url }}<td/>
      </tr>
      @endforeach
    </tbody>
  </table>
