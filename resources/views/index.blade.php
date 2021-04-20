@extends('parent')

@section('main')

<div align="right">
  <a href="{{ route('crud.create') }}" class="btn btn-success btn-sm">Novo</a>
</div>
<br />

@if ($message = Session::get('sucesso'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered table-striped">
   <tr>
       <th width="10%">Imagem</th>
       <th width="35%">Nome</th>
       <th width="35%">Sobrenome</th>
       <th width="30%">Ação</th>
   </tr>
   @foreach($data as $row)
   <tr>
      <td><img src="{{ URL::to('/') }}/imagens/{{ $row->imagem }}" class="img-thumnail" width="75" /></td>
      <td>{{ $row->nome }}</td>
      <td>{{ $row->sobrenome }}</td>
      <td>
          <form action="{{ route('crud.destroy', $row->id) }}" method="post">
             <a href="{{ route('crud.show', $row->id) }}" class="btn btn-primary">Ver</a>
             <a href="{{ route('crud.edit', $row->id) }}" class="btn btn-primary">Editar</a>
             @csrf
             @method('DELETE')
             <button type="submit" class="btn btn-danger">Deletar</button>
          </form>
      </td>
   </tr>
   @endforeach
</table>
{!! $data->links() !!}
@endsection
