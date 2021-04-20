@extends('parent')

@section('main')

<div class="jumbotron text-center">
   <div align="right">
     <a href="{{ route('crud.index') }}" class="btn btn-default">Voltar</a>
   </div>
   <br />
   <img src="{{ URL::to('/') }}/imagens/{{ $data->imagem }}" class="img-thumbnail" />
   <h3>Nome - {{ $data->nome }}</h3>
   <h3>Sobrenome - {{ $data->sobrenome }}</h3>
</div>
@endsection
