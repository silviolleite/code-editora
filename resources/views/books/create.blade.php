@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Cadastrar um Novo Livro</h3>
            {!! Form::open(['route' => 'books.store', 'class' => 'form']) !!}
            {!! Form::hidden('user_id', Auth::user()->id) !!}
            {!! Html::openFormGroup('title', $errors) !!}
                {!! Form::label('title', 'Nome do Livro') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
                {!! Form::error('title', $errors) !!}
            {!! Html::closeFormGroup() !!}
            {!! Html::openFormGroup('subtitle', $errors) !!}
                {!! Form::label('subtitle', 'Descrição') !!}
                {!! Form::text('subtitle', null, ['class' => 'form-control']) !!}
                {!! Form::error('subtitle', $errors) !!}
            {!! Html::closeFormGroup() !!}
            {!! Html::openFormGroup('price', $errors) !!}
                {!! Form::label('price', 'Preço') !!}
                {!! Form::text('price', null, ['class' => 'form-control']) !!}
                {!! Form::error('price', $errors) !!}
            {!! Html::closeFormGroup() !!}

            {!! Html::openFormGroup() !!}
                {!! Form::submit('Cadastrar Livro', ['class' => 'btn btn-primary']) !!}
            {!! Html::closeFormGroup() !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection