@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-slate-800 leading-tight">
        Mi Perfil
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="profile-container bg-white rounded-xl shadow border border-slate-200 p-6">
                <div class="profile-card bg-slate-50 rounded-xl p-6">
                    <div class="profile-card-body">
                        <div class="profile-avatar flex flex-col gap-4 sm:flex-row sm:items-center">
                            <div class="profile-avatar-circle flex h-16 w-16 items-center justify-center rounded-full bg-slate-900 text-2xl font-bold text-white">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <div class="profile-avatar-info space-y-1">
                                <h4 class="text-xl font-semibold text-slate-900">{{ Auth::user()->name }}</h4>
                                <p class="text-slate-600">{{ Auth::user()->email }}</p>
                                <p class="text-sm text-sky-700">Administrador del Sistema Cultural</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="profile-grid grid gap-6 lg:grid-cols-[1.2fr_1fr]">
                    <div class="profile-card bg-white rounded-xl shadow border border-slate-200 overflow-hidden">
                        <div class="profile-card-header bg-slate-50 px-6 py-4">
                            <h3 class="text-lg font-semibold">📝 Información del Perfil</h3>
                        </div>
                        <div class="profile-card-body p-6">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>

                    <div class="profile-card bg-white rounded-xl shadow border border-slate-200 overflow-hidden">
                        <div class="profile-card-header bg-slate-50 px-6 py-4">
                            <h3 class="text-lg font-semibold">🔒 Actualizar Contraseña</h3>
                        </div>
                        <div class="profile-card-body p-6">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                </div>

                <div class="profile-card bg-white rounded-xl shadow border border-slate-200 overflow-hidden">
                    <div class="profile-card-header bg-slate-50 px-6 py-4">
                        <h3 class="text-lg font-semibold">⚠️ Zona de Peligro</h3>
                    </div>
                    <div class="profile-card-body p-6">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection