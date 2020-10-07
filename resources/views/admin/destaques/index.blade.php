@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            Destaques
                        </h2>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Texto</th>
                                    <th>Imagem</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($destaques as $destaque)
                                    <tr>
                                        <td>{{ $destaque->titulo }}</td>
                                        <td>{{ $destaque->texto }}</td>
                                        <td><img width="100" src="{{asset($destaque->imagem)}}"></td>
                                        <td>
                                            <a href="{{ url("/admin/destaques/editar/{$destaque->id}") }}" class="btn btn-xs btn-info">Editar</a>
                                        </td>
                                        
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No post available.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
