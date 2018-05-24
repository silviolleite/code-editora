@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Listagem de Livros</h3>
            {!! Button::primary('Novo Livro')->asLinkTo(route('books.create')) !!}
        </div>
        <div class="row">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Subtítulo</th>
                    <th>Preço</th>
                    <th>Publicado por</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->subtitle }}</td>
                        <td>{{ $book->price }}</td>
                        <td>{{ $book->User->name }}</td>
                        <td>
                            <ul>
                                <li><a href="{{ route('books.edit', ['book' => $book->id]) }}">Editar</a></li>
                                <li>
                                    <?php $index = "delete-form-{$loop->index}"  ?>
                                    <a href="{{ route('books.destroy', ['book' => $book->id]) }}" onclick="event.preventDefault()
                                            ;document.getElementById('{{ $index }}').submit()">Excluir</a>
                                    {!! Form::open(['route' => ['books.destroy', 'book' => $book->id], 'method' => 'DELETE', 'id' => $index, 'style' => 'display:none']) !!}
                                    {!! Form::close() !!}
                                </li>
                            </ul>


                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $books->links() }}
        </div>
    </div>
@endsection
