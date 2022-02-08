@extends('layouts.app')


@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="headerWrapper">
                        @if(session('status'))
                        <div class="status-bg">{{ session('status') }}</div>
                        @endif
                        <h2 class="tableTitle">@lang('Lista de contactos')</h2>
                        <a href="{{ url('dashboard/create') }}"><button class="btn-header addContactStyle">{{ __('Añadir Nuevo Contacto') }}</button></a>
                    </div>
                    <table class="table1">
                        <tr>
                            <th>@lang('Nombre')</th>
                            <th>@lang('Edat') </th>
                            <th>@lang('Fecha de Nacimiento')</th>
                            <th>@lang('Descripcion')</th>
                            <th>@lang('Genero')</th>
                            <th>@lang('Opcion')</th>
                            <th>@lang('Mostrar')</th>
                            <th>@lang('Editar')</th>
                            <th>@lang('Eliminar')</th>
                        </tr>
                    @foreach($contactos as $contact)

                            <tr>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->age }}</td>
                                <td>{{ $contact->bornDate }}</td>
                                <td>{{ $contact->description }}</td>
                                <td>{{ $contact->gender }}</td>
                                <td>{{ $contact->select }}</td>
                                    
                                    
                                    <td><a href="{{ url('dashboard/'.$contact->id) }}"><button class="btn btn-edit">{{ __('Mostrar') }}</button></a></td>

                                @can('edit',$contactAuth)
                                    <td><a href="{{ url('dashboard/'.$contact->id.'/edit') }}"><button class="btn btn-edit">{{ __('Editar') }}</button></a></td>
                                    <td>
                                        <form action="{{ url('dashboard/'.$contact->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-remove">{{ __('Eliminar') }}</button>
                                        </form>
                                    </td>
                                @endcan

                                @cannot('edit',$contactAuth)
                                    <td><a class="" href="{{ url('dashboard/'.$contact->id.'/edit') }}"><button disabled class="btn btn-edit">{{ __('Editar') }}</button></a></td>
                                    <td>
                                        <form action="{{ url('dashboard/'.$contact->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-remove" disabled>{{ __('Eliminar') }}</button>
                                        </form>
                                    </td>
                                @endcannot


                            </tr>
                    @endforeach
                </table>	

                </div>
            </div>
        </div>
    </div>
@endsection