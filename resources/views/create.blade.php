@extends('parent')

@section('main')

@if($errors->any())
<div class="alert alert-danger">
   <ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
   </ul>
</div>
@endif

<div align="right">
  <a href="{{ route('crud.index') }}" class="btn btn-default">Voltar</a>
</div>

<form method="post" action="{{ route('crud.store') }}" enctype="multipart/form-data">

@csrf

<div class="form-group">
   <label class="col-md-4 text-right">Digite seu Primeiro Nome</label>
   <div class="col-md-8">
      <input type="text" name="nome" class="form-control input-lg" />
   </div>
</div>
<br />
<br />
<br />
<div class="form-group">
   <label class="col-md-4 text-right">Digite seu Sobrenome</label>
   <div class="col-md-8">
      <input type="text" name="sobrenome" class="form-control input-lg" />
   </div>
</div>
<br />
<br />
<br />

<div class="form-group">
  <label class="col-md-4 text-right">Selecione uma imagem para perfil</label>
  <div class="col-md-8">
    <input type="file" name="imagem">
  </div>
</div>
<br />
<br />
<br />

<div class="form-group text-center">
   <input type="submit" name="add" class="bt btn-primary input-lg" value="Salvar" />
</div>
</form>
@endsection
