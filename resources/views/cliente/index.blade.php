@extends("template.master")

@section("titulo", "Cadastro de Clientes")

@section("cadastro")
	
	<form method="POST" action="/cliente" class="row">
		
		@csrf
		<input type="hidden" id="id" name="id" value="{{ $cliente->id }}" />
		
		<h1>Cadastro</h1>
		
		<div class="form-group col-6">
			<label for="nome">Nome: </label>
			<input type="text" id="nome" name="nome" value="{{ $cliente->nome }}" class="form-control"/>
		</div>
		<div class="form-group col-6">
			<label for="cpf">CPF: </label>
			<input type="text" id="cpf" name="cpf" value="{{ $cliente->cpf }}" class="form-control"/>
		</div>
		<div class="form-group col-6">
			<label for="email">E-mail: </label>
			<input type="email" id="email" name="email" value="{{ $cliente->email }}" class="form-control"/>
		</div>
		<div class="form-group col-6">
			<label for="telefone">Telefone: </label>
			<input type="text" id="telefone" name="telefone" value="{{ $cliente->telefone }}" class="form-control"/>
		</div>
		<div class="form-group col-6">
			<label for="data_nascimento">Data Nascimento: </label>
			<input type="date" id="data_nascimento" name="data_nascimento" value="{{ $cliente->data_nascimento }}" class="form-control"/>
		</div>
		<div class="form-group col-6">
			<label for="status">Status:</label>
			<select name="status" class="form-control">
				<option value=""></option>
				@foreach($statuses as $status)
					@if ($status->id == $cliente->status)
						<option value="{{ $status->id }}" selected="selected">{{ $status->nome }}</option>
					@else
						<option value="{{ $status->id }}">{{ $status->nome }}</option>
					@endif
				@endforeach				
			</select>
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
				<th>E-mail</th>
				<th>Status</th>
				<th>Editar</th>
				<th>Excluir</th>
			</tr>
		</thead>
		<tbody>
			@foreach($clientes as $cliente)
				<tr>
					<td>{{ $cliente->nome }}</td>
					<td>{{ $cliente->email }}</td>
					<td>{{ $cliente->status }}</td>
					<td>
						<a href="/cliente/{{ $cliente->id }}/edit" class="btn btn-warning">Editar</a>
					</td>
					<td>
						<form action="/cliente/{{ $cliente->id }}" method="POST">
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