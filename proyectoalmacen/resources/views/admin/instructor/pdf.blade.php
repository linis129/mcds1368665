
<table>
	<tr>
		<th> Nombre </th>
		<th> Documento </th>
	</tr>
@foreach($usr as $usr)
	<tr>
		<td>{{ $usr->nombre }}</td>
		<td>{{ $usr->documento }}</td>
		
	</tr>
@endforeach
</table>