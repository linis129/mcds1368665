
<table>
	<tr>
		<th> Nombre </th>
		<th> Estado </th>
	</tr>
@foreach($amb as $amb)
	<tr>
		<td>{{ $amb->nombre }}</td>
		<td>{{ $amb->estado }}</td>
		
	</tr>
@endforeach
</table>