@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Buscador</div>

                    <div class="panel-body">
                        @include('tags/partials/search')
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Tags</div>

                    <div class="panel-body">
                        <div class="col-md-6">
                            <p class="text-info" style="margin-top: 6px;">Total de Tags Encontrados: {{ $tags->total() }}</p>
                        </div>
                        <div class="col-md-6" style="text-align: right;">
                            <a class="btn btn-primary btn-sm" href="{{ route('tags.create') }}"><i class="fa fa-tag"></i> Nuevo Tag</a>
                        </div>
                    </div>

                    <table class="table table-hover">
                        <thead>
                            <th>Nombre</th>
                            <th>Instrumentos asociados</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                            @foreach($tags as $tag)
                                <tr>
                                    <td>{{ $tag->nombre }}</td>
                                    <td>{{ count($tag->instrumentos) }}</td>
                                    <td>
                                        <a class="btn btn-default btn-xs" href="{{ route('tags.show',$tag) }}"><i class="fa fa-eye"></i> Ver</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $tags->appends(Request::only(['nombre']))->render() }}
            </div>
        </div>
    </div>
    {{ session([
        'index' => url()->full()
       ])
    }}
@endsection