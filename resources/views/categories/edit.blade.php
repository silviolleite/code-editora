@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Editar  Categoria</h3>
            {!! Form::model($category, ['route' => ['categories.update', 'category' => $category->id],
                'class' => 'form', 'method' => 'PUT'])
             !!}
            <div class="form-group">
                {!! Form::label('name', 'Nome') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Criar Categoria', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection