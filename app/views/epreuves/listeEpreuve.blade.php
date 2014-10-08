	@if ($epreuves->isEmpty())
		<p>Aucun épreuves disponibles!</p>
	@else
		<table id='latable' class="table table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Nom</th>
					<th>description</th>
					<th> </th>
				</tr>
			</thead>
			<tbody>
				@foreach($epreuves as $epreuve)
					<tr>
						<td><a href="{{ action('EpreuvesController@show', [ $epreuve->id]) }}">{{ $epreuve->id }}</a> </td>
						<td>{{ $epreuve->nom }} </td>
						<td>{{ $epreuve->description}} </td>
						<td><a href="{{ action('EpreuvesController@edit', [$epreuve->id]) }}" class="btn btn-info">Éditer</a></td>
							
						<td>
							{{ Form::open(array('action' => array('EpreuvesController@destroy', $epreuve->id), 'method' => 'delete', 'data-confirm' => 'Êtes-vous certain?')) }}
							<button type="submit" href="{{ URL::route('epreuves.destroy', $epreuve->id) }}" class="btn btn-danger btn-mini">Effacer</button>
							{{ Form::close() }}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@endif
