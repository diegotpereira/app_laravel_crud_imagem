@extends('parent')

@section('main')

<form method="post" action="{{ route('crud.update', $data->id) }}" enctype="multipart/form-data">

@csrf
@method('PATCH')
<div class="form-group">
   <label class="col-md-4 text-right">Digite seu Primeiro Nome</label>
   <div class="col-md-8">
      <input type="text" name="nome" class="form-control input-lg" value="{{ $data->nome }}"/>
   </div>
</div>
<br />
<br />
<br />
<div class="form-group">
   <label class="col-md-4 text-right">Digite seu Sobrenome</label>
   <div class="col-md-8">
      <input type="text" name="sobrenome" class="form-control input-lg"  value="{{ $data->sobrenome }}"/>
   </div>
</div>
<br />
<br />
<br />

<div class="form-group">
  <label class="col-md-4 text-right">Selecione uma imagem para perfil</label>
  <div class="col-md-8">
    <input type="file" name="imagem">
    <img src="{{ URL::to('/') }}/imagens/{{ $data->imagem }}" class="img-thumbnail" width="100" />
    <input type="hidden" name="hidden_image" value="{{ $data->imagem }}" />
  </div>
</div>
<br />
<br />
<br />

<div class="form-group text-center">
   <input type="submit" name="edit" class="bt btn-primary input-lg" value="Editar" />
</div>
</form>
@endsection
