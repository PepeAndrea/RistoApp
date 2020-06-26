@extends('template')

@section('content')
<h1 class="text-center m-2">Aggiungi ristorante</h1>
<div class="container mt-5">
    <form method="post" action="/add">
    @csrf

    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Nome</label>
      <div class="col-sm-10">
        <input name="nome" type="text" class="form-control" id="inputEmail3" placeholder="Nome dell'attività">
        @error('nome')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
    </div>

    <div class="form-group row">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Indirizzo</label>
      <div class="col-sm-10">
        <input name="indirizzo" type="text" class="form-control" id="inputPassword3" placeholder="Indirizzo">
        @error('indirizzo')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
    </div>

    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input name="email" type="email" class="form-control" id="inputPassword3" placeholder="Email">
          @error('email')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>

    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-success font-weight-bold">Aggiungi</button>
      </div>
    </div>

  </form>

</div>

@endsection