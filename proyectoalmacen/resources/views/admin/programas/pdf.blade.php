
<table>
	<tr>
		<th> Nombre </th>
		<th> Codigo Programa </th>
		<th> Fecha de Vencimiento </th>
	</tr>
@foreach($pro as $pro)
	<tr>
		<td>{{ $pro->nombre }}</td>
		<td>{{ $pro->codigo }}</td>
		<td>{{ $pro->fecha_vencimiento }}</td>
		
	</tr>
@endforeach
</table>