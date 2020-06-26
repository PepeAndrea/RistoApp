@extends('template')

@section('content')

<div class="container m-5">
    <form action="/search" method="post" class="mr-2 ml-2">
        <div class="form-row">
        <div class="form-group col">
          <input type="text" class="form-control" name="address" placeholder="Inserisci località">
        </div>
        <div class="form-group col-2">
            <button type="submit" class="btn btn-success">Cerca</button>
        </div>
    </div>
    @csrf
    </form>
</div>

@if (session('status'))
    <div class="alert container alert-danger alert-dismissible fade show" role="alert">
      {{session('status')}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
@endif

@if ($data ?? false)
<div>
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Indirizzo</th>
            <th scope="col">Email</th>
            <th scope="col">Operazioni</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data as $risto)
                <tr class="align-items-center">
                <th scope="row">{{$risto->id}}</th>
                <td>{{$risto->name}}</td>
                <td>{{$risto->address}}</td>
                <td>{{$risto->email}}</td>
                <td>
                  <a href="/delete/{{$risto->id}}"><i class="fa fa-trash" style="color:red; aria-hidden="true"></i></a>
                  <a href="/edit/{{$risto->id}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                </td>
                </tr>
            @endforeach
        </tbody>
      </table>
</div>
@else
    <div class="container">
        <h1 class="text-center">Cerca i ristoranti inserendo la località</h1>
    </div>
@endif

@endsection