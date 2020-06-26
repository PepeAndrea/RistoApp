@extends('template')

@section('content')
    
    <div>
        <h1 class="text-center">Lista Ristoranti</h1>
        <a class="btn btn-success m-2" href="/add" role="button">Aggiungi Ristorante</a>
        @if (session('status'))
        <div class="alert container alert-success alert-dismissible fade show" role="alert">
          {{session('status')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        <div class="table-responsive">
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
    </div>

@endsection