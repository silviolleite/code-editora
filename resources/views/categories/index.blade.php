@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Listagem de Categorias</h3>
            {!! Button::primary('Nova Categoria')->asLinkTo(route('categories.create')) !!}
        </div>
        <div class="row">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <ul>
                                <li><a href="{{ route('categories.edit', ['category' => $category->id]) }}">Editar</a></li>
                                <li>
                                    <?php $index = "delete-form-{$loop->index}"  ?>
                                    <a href="{{ route('categories.destroy', ['category' => $category->id]) }}" onclick="event.preventDefault()
                                            ;document.getElementById('{{ $index }}').submit()">Excluir</a>
                                    {!! Form::open(['route' => ['categories.destroy', 'category' => $category->id], 'method' => 'DELETE', 'id' => $index, 'style' => 'display:none']) !!}
                                    {!! Form::close() !!}
                                </li>
                            </ul>


                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $categories->links() }}
        </div>
    </div>
@endsection