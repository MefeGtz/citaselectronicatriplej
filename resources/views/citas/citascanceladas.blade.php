
    <!-- Projects table -->
    <table  id="tabl" class="table table-striped table-bordered table-condensed table-hover" style="width:100%" >
      <thead class="thead-light">
        <tr>
          <th scope="col">Id Cita</th>
          <th scope="col">Cliente </th>
          <th scope="col">Teléfono</th>
          <th scope="col">Dirección</th>
          <th scope="col">Aparato </th>
          <th scope="col">Marca </th>
          <th scope="col">Modelo </th>
          <th scope="col">Falla </th>
          <th scope="col">Fecha Cita </th>
          <th scope="col">Hora Inicial </th>
          <th scope="col">Hora Final </th>
          <th scope="col">Técnico</th>
          <th scope="col">Observaciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($citascanc as $cita)
        <tr>
          <th scope="row">
            {{$cita->Id_cita}}
          </th>
          <td>
            {{$cita->cliente->Nombre.' '.$cita->cliente->Apellidos}}
          </td>
          <td>
            {{$cita->cliente->Telefono}}
          </td>
          <td>
            {{$cita->cliente->Direccion}}
          </td>
          <td>
            {{$cita->aparato->tipoaparato->Nombre }}
          </td>
          <td>
            {{$cita->aparato->marca->Marca}}
          </td>
          <td>
            {{$cita->aparato->Modelo}}
          </td>
          <td>
            {{$cita->Falla}}
          </td>
          <td>
            {{$cita->Fecha_cita}}
          </td>
          <td>
            {{$cita->Hora_Inicial_12}}
          </td>
          <td>
            {{$cita->Hora_Final_12}}
          </td>
          <td>
            {{$cita->tecnico->name}}
          </td>
          <td>
            {{$cita->Observaciones}}
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
