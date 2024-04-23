<div class="modal fade" aria-hidden="true" role="dialog" 
 tabindex="-1" id="modalcancelar{{$cita->Id_cita}}">	

 <div class="modal-dialog modal-dialog-centered" role="document">

 <form action="{{url('/vercitas/'.$cita->Id_cita.'/cancel')}}" method="POST">
    @csrf
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="background:#3c8dbc; color:white" >
                <h3 style="color: beige" class="modal-title" id="exampleModalLabel" >Cancelar cita: {{$cita->Id_cita}}   Fecha de cita: {{$cita->Fecha_cita}}</h3 >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
			</div>
			<div class="modal-body">
				<strong><p>Confirme si desea cancelar la cita</p></strong>
                
            
                    <div class="form-group">
                        <label for="cobro">Motivo de cancelación</label>
                        <input type="text" name="observaciones" required value="{{$cita->Observaciones}}" class="form-control">
                    </div>
			</div>
            
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>
</form>
</div>
</div>

{{-- este modal es para finalizar la cita --}}

<div class="modal fade" aria-hidden="true" role="dialog" 
 tabindex="-1" id="modalfinal{{$cita->Id_cita}}">	

 <div class="modal-dialog modal-dialog-centered" role="document">

 <form action="{{url('/vercitas/'.$cita->Id_cita.'/final')}}" method="POST">
    @csrf
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="background:#3c8dbc; color:white" >
                <h3 style="color: beige" class="modal-title" id="exampleModalLabel" >Finalizar cita: {{$cita->Id_cita}}   Fecha de cita: {{$cita->Fecha_cita}}</h3 >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

			</div>
			<div class="modal-body">
				<strong><p>Confirme si desea dar por finalizada la cita</p></strong>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="Hora_final">Hora Final</label>
						<select type="text" name="Hora_final" required class="form-control"  id="Horaf" placeholder="6:00 PM">
							@for($i=9; $i<=11; $i++)
								<option value="{{$i.':'.'00'.' AM'}}"
								@if($cita->Hora_Final_12==($i.':'.'00'.' AM')) selected @endif>{{$i}}:00 AM </option>
							@endfor
								<option value="{{'12'.':'.'00'.' PM'}}"
								@if($cita->Hora_Final_12==('12'.':'.'00'.' PM')) selected @endif>12:00 PM </option>
						  @for($i=1; $i<=6; $i++)
								 <option value="{{$i.':'.'00'.' PM'}}"
								 @if($cita->Hora_Final_12==($i.':'.'00'.' PM')) selected @endif>{{$i}}:00 PM </option>
						  @endfor   
						</select>
					 </div>
				</div>
		

                    <div class="form-group">
                        <label for="cobro">Observación</label>
                        <input type="text" name="observaciones" value="{{$cita->Observaciones}}" class="form-control">
                    </div>
			</div>
            
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>
</form>
</div>
</div>






