@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-slate-800 leading-tight">
        👤 Mi Perfil
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg p-6 border border-slate-200">
                <div class="space-y-6">

                    <div>
                        <h3 class="text-lg font-bold text-slate-900">Nombre</h3>
                        <p class="text-slate-700">{{ $user->name }}</p>
                    </div>

                    <div>
                        <h3 class="text-lg font-bold text-slate-900">Email</h3>
                        <p class="text-slate-700">{{ $user->email }}</p>
                    </div>

                    <div>
                        <h3 class="text-lg font-bold text-slate-900">Rol</h3>
                        <span class="inline-flex rounded-full px-3 py-1 text-sm font-medium text-white {{ $user->role == 'admin' ? 'bg-red-500' : 'bg-blue-500' }}">
                            {{ $user->role }}
                        </span>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection