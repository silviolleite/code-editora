@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Cadastrar um Novo Livro</h3>
            {!! Form::open(['route' => 'books.store', 'class' => 'form']) !!}
            {!! Form::hidden('user_id', Auth::user()->id) !!}

            @include('books._form')

            {!! Html::openFormGroup() !!}
            {!! Button::primary('Cadastrar Livros')->submit() !!}
            {!! Html::closeFormGroup() !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection