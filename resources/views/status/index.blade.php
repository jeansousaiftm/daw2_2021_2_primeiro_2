@extends("template.master")

@section("titulo", "Cadastro de Status")

@section("cadastro")
	
	<form action="/status" method="POST" class="row">
		
		@csrf
		<input type="hidden" name="id" value="{{ $status->id }}" />
		
		<h1>Cadastro</h1>
		
		<div class="form-group col-6">
			<label for="nome">Nome:</label>
			<input type="text" name="nome" value="{{ $status->nome }}" class="form-control" />
		</div>
		<div class="form-group col-6">
			<button type="submit" class="btn btn-success bottom">Salvar</button>
			<a href="/cliente" class="btn btn-primary bottom">Novo</a>
		</div>		
		
	</form>
	
@endsection

@section("listagem")
		
	<h1>Listagem</h1>
	
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nome</th>
				<th>Editar</th>
				<th>Excluir</th>
			</tr>
		</thead>
		<tbody>
			@foreach($statuses as $status)
				<tr>
					<td>{{ $status->nome }}</td>
					<td>
						<a href="/status/{{ $status->id }}/edit" class="btn btn-warning">Editar</a>
					</td>
					<td>
						<form action="/status/{{ $status->id }}" method="POST">
							@csrf
							<input type="hidden" name="_method" value="DELETE" />
							<button type="submit" class="btn btn-danger" onclick="return confirm('Deseja realmente excluir?');">Excluir</button>
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection