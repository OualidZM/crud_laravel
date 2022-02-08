@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Contactos') }}
    </h2>
@endsection

@section('content')
<a href="{{ url('dashboard') }}"><button class="btn-header back-style">{{ __('Atras') }}</button></a>

<img src="{{ Storage::url($contacto->userProfile) }}" class="img-flo-rig" alt="Image profile">

<div class="showWrapper">

    <table class="table">
        <tr>
            <th>@lang('Nombre')</th>
            <th>{{$contacto->name}}</th>

        </tr>


        <tr>
            <th>@lang('Edat') </th>
            <th>{{$contacto->age}}</th>


        </tr>
            <th>@lang('Fecha de Nacimiento')</th>
            <th>{{$contacto->bornDate}}</th>
        <tr>

        </tr>
            <th>@lang('Descripcion')</th>
            <th>{{$contacto->description}}</th>

        <tr>
            <th>@lang('Genero')</th>
            <th>{{$contacto->gender}}</th>

        </tr>
        <tr>
            <th>@lang('Opcion')</th>
            <th>{{$contacto->select}}</th>

        </tr>


        <tr>
            <th>@lang('Acuerdo')</th>
            <th>{{$contacto->agrement}}</th>


        </tr>

        @can('edit',$contactAuth)

        <tr>
            <th>@lang('Editar')</th>
            <th><a href="{{ url('dashboard/'.$contacto->id.'/edit') }}"><button class="btn btn-edit">{{ __('Editar') }}</button></a></th>
        </tr>

        <tr>
            <th>@lang('Eliminar')</th>
            <th>
                <form action="{{ url('dashboard/'.$contacto->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-remove">{{ __('Eliminar') }}</button>
                </form>
            </th>
        </tr>

        @endcan 



        @cannot('edit',$contactAuth)

        <tr>
            <th>@lang('Editar')</th>
            <td><a class="" href="{{ url('dashboard/'.$contacto->id.'/edit') }}"><button disabled class="btn btn-edit">{{ __('Editar') }}</button></a></td>
        </tr>
        <tr>
            <th>@lang('Eliminar')</th>
            <th>
                <form action="{{ url('dashboard/'.$contacto->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-remove" disabled>{{ __('Eliminar') }}</button>
                </form>
            </th>
        </tr>
        @endcannot 
    </table>
</div>

@endsection