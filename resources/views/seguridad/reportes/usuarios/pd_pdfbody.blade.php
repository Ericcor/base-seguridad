{!! Html::style('css/pdf.css') !!}
          <table style="width: 100%" border="0" cellspacing="0">
            <thead style="background-color: #C2E7FC;">
              <tr class="class="thead-dark"" role="alert">
                <th>Nombre</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Estado</th>
              </tr>
            </thead>
            <tbody>
              @foreach($usuarios as $usuario)
              <tr>
                <td>{{ $usuario->name }}</td>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->roles()->pluck('name')->implode(', ') }}</td>
                <?php $status = $usuario->status == 1 ? ['Activo', ''] : ['Inactivo', 'default']; ?>
                      <?php $status = $usuario->deleted_at != null ? ['Eliminado', ''] : $status; ?>
                  <td style="text-align: center;"><span class="label label-{{ $status[1] }}">{{ $status[0] }}</span></td>
              </tr>
              @endforeach
            </tbody>
           </table>
