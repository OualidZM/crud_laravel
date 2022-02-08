@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Contactos') }}
    </h2>
@endsection

@section('content')

    <ul class="errorWrapper">
        @foreach ($errors->all() as $error)
            <li class="listError">{{ $error }}</li>
        @endforeach
    </ul>
    <div class="">

        <h2 class="tableTitle">{{ __('Editar Contacto') }}</h2>
        <a href="{{ url('dashboard') }}"><button class="btn-header back-style">{{ __('Atras') }}</button></a>
    </div>


        <form action="{{ url("dashboard/".$contactos->id) }}" method="POST" class="formWrapper" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="name">@lang('Name')</label>

            <input type="text" name="name" id="name" placeholder="Name" value="{{ old('name',$contactos->name) }}">
            @error('name')
                <div class="error-bg">{{ $message }}</div>
            @enderror
            <label for="age">@lang('Edat')</label>
            <input type="number" name="age" id="age" placeholder="Age" value="{{ old('age',$contactos->age) }}">
            @error('age')
                <div class="error-bg">{{ $message }}</div>
            @enderror
            <label for="date">@lang('Fecha de Nacimiento')</label>
            <input type="date" name="bornDate" id="data" value="{{ old('bornDate',$contactos->bornDate) }}">
            @error('bornDate')
                <div class="error-bg">{{ $message }}</div>
            @enderror
            <label for="descripcion">@lang('Descripcion')</label>
            <textarea name="description" id="descripcion" cols="20" rows="10">{{ old('description',$contactos->description)}}</textarea>
            @error('description')
                <div class="error-bg">{{ $message }}</div>
            @enderror
            <label for="">@lang('Genero')</label>
            <div  style="display:flex; justify-content:space-around; width:15vw;">
                <label for="radio">{{ __('hombre') }}<input type="radio" value="hombre" name="gender" id="" {{ old('gender') == "hombre" ? 'checked='.'checked' : '' }}></label>
                <label for="radio">{{ __('mujer') }}<input type="radio" value="mujer" name="gender" id="" {{ old('gender') == "mujer" ? 'checked='.'checked' : '' }}></label>
            </div>
            @error('gender')
                <div class="error-bg">{{ $message }}</div>
            @enderror
            <label for="">@lang('Color Favorito')</label>


            <select name="select" id="select">

                <option value="verde" @if (old('select') === 'verde') selected @endif> @lang('verde')</option>
                <option value="rojo" @if (old('select') === 'rojo') selected @endif> @lang('rojo')</option>
                <option value="azul" @if (old('select') === 'azul') selected @endif> @lang('azul')</option>
                <option value="amarillo" @if (old('select') === 'amarillo') selected @endif> @lang('amarillo')</option>
                <option value="marron" @if (old('select') === 'marron') selected @endif> @lang('marron')</option>
                <option value="rosa" @if (old('select') === 'rosa') selected @endif> @lang('rosa')</option>
            </select>

            @error('select')
                <div class="error-bg">{{ $message }}</div>
            @enderror

            <label for="userProfile">{{ __('Añade una imagen') }}<input type="file" name="userProfile" id="userProfile"></label>


            <input type="submit" value="{{ __('Actualizar') }}" class="btn">
        </form>



@endsection