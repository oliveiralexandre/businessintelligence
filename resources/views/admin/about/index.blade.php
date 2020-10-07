@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            Quem Somos
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
                                @forelse ($abouts as $about)
                                    <tr>
                                        <td>{{ $about->titulo }}</td>
                                        <td>{{ $about->texto }}</td>
                                        <td><img width="100" src="{{asset($about->imagem)}}"></td>
                                        <td>
                                            <a href="{{ url("/admin/sobre/editar/{$about->id}") }}" class="btn btn-xs btn-info">Editar</a>
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
