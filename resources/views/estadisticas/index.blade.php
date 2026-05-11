@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2/dist/tailwind.min.css" rel="stylesheet">

<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-blue-800 mb-2">Estadísticas Culturales</h1>
        <p class="text-gray-600">Análisis de datos del patrimonio cultural de El Salvador</p>
    </div>

    <!-- Tarjetas de resumen -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg shadow-md p-6 border-l-4 border-blue-600">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-600 text-sm font-semibold mb-1">Total de Obras</p>
                    <p class="text-3xl font-bold text-blue-900">{{ $totales['total_obras'] }}</p>
                </div>
                <div class="text-blue-500 text-4xl"></div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-lg shadow-md p-6 border-l-4 border-green-600">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-600 text-sm font-semibold mb-1">Con Imagen</p>
                    <p class="text-3xl font-bold text-green-900">{{ $totales['con_imagen'] }}</p>
                </div>
                <div class="text-green-500 text-4xl">🖼️</div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-lg shadow-md p-6 border-l-4 border-orange-600">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-orange-600 text-sm font-semibold mb-1">Tipos de Obra</p>
                    <p class="text-3xl font-bold text-orange-900">{{ $totales['tipos_distintos'] }}</p>
                </div>
                <div class="text-orange-500 text-4xl">🏷️</div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-lg shadow-md p-6 border-l-4 border-purple-600">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-purple-600 text-sm font-semibold mb-1">Autores Registrados</p>
                    <p class="text-3xl font-bold text-purple-900">{{ $totales['autores_distintos'] }}</p>
                </div>
                <div class="text-purple-500 text-4xl">👥</div>
            </div>
        </div>
    </div>

    <!-- Gráficas principales -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
        <!-- Gráfica de tipos de obra -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-semibold text-blue-800 mb-4">Distribución por Tipo de Obra</h2>
            <canvas id="graficoTipos" width="400" height="300"></canvas>
        </div>

        <!-- Gráfica de obras por año -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-semibold text-blue-800 mb-4">Obras por Año</h2>
            <canvas id="graficoAnios" width="400" height="300"></canvas>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
        <!-- Top autores -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-semibold text-blue-800 mb-4">Top 10 Autores más Productivos</h2>
            <canvas id="graficoAutores" width="400" height="300"></canvas>
        </div>

        <!-- Contribución por usuario -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-semibold text-blue-800 mb-4">Contribuciones por Usuario</h2>
            <canvas id="graficoUsuarios" width="400" height="300"></canvas>
        </div>
    </div>

    <!-- Obras recientes -->
    <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
        <h2 class="text-xl font-semibold text-blue-800 mb-4">Obras Registradas Recientemente</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead class="bg-blue-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-blue-800">Título</th>
                        <th class="px-4 py-2 text-left text-blue-800">Tipo</th>
                        <th class="px-4 py-2 text-left text-blue-800">Autor</th>
                        <th class="px-4 py-2 text-left text-blue-800">Registrado por</th>
                        <th class="px-4 py-2 text-left text-blue-800">Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($obrasRecientes as $obra)
                    <tr class="border-b border-gray-200 hover:bg-blue-50 transition">
                        <td class="px-4 py-2">{{ $obra->titulo }}</td>
                        <td class="px-4 py-2">{{ ucfirst($obra->tipo ?? 'N/A') }}</td>
                        <td class="px-4 py-2">{{ $obra->autor ?? 'Anónimo' }}</td>
                        <td class="px-4 py-2">{{ $obra->user ? $obra->user->name : 'Sistema' }}</td>
                        <td class="px-4 py-2">{{ $obra->created_at->format('d/m/Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Botón para exportar estadísticas a PDF -->
    <div class="text-center">
        <a href="{{ route('estadisticas.exportar.pdf') }}" 
           class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-lg transition duration-300 inline-flex items-center">
            Exportar estadísticas a PDF
        </a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Gráfica de tipos
        const tiposData = @json($obrasPorTipo);
        const ctxTipos = document.getElementById('graficoTipos').getContext('2d');
        new Chart(ctxTipos, {
            type: 'pie',
            data: {
                labels: tiposData.map(item => item.tipo || 'No especificado'),
                datasets: [{
                    data: tiposData.map(item => item.total),
                    backgroundColor: [
                        '#3B82F6', '#EF4444', '#10B981', '#F59E0B', '#8B5CF6',
                        '#EC4899', '#06B6D4', '#F97316', '#6366F1', '#14B8A6'
                    ],
                    borderWidth: 2,
                    borderColor: '#fff'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            font: { size: 11 }
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.raw || 0;
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = ((value / total) * 100).toFixed(1);
                                return `${label}: ${value} obras (${percentage}%)`;
                            }
                        }
                    }
                }
            }
        });

        // Gráfica de años
        const aniosData = @json($obrasPorFecha);
        const ctxAnios = document.getElementById('graficoAnios').getContext('2d');
        new Chart(ctxAnios, {
            type: 'bar',
            data: {
                labels: aniosData.map(item => item.año),
                datasets: [{
                    label: 'Obras registradas',
                    data: aniosData.map(item => item.total),
                    backgroundColor: '#3B82F6',
                    borderColor: '#2563EB',
                    borderWidth: 2,
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { stepSize: 1 },
                        title: {
                            display: true,
                            text: 'Cantidad de obras',
                            font: { weight: 'bold' }
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Año',
                            font: { weight: 'bold' }
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `Obras: ${context.raw}`;
                            }
                        }
                    }
                }
            }
        });

        // Gráfica de autores
        const autoresData = @json($obrasPorAutor);
        const ctxAutores = document.getElementById('graficoAutores').getContext('2d');
        new Chart(ctxAutores, {
            type: 'bar',
            data: {
                labels: autoresData.map(item => item.autor || 'Anónimo'),
                datasets: [{
                    label: 'Obras por autor',
                    data: autoresData.map(item => item.total),
                    backgroundColor: '#10B981',
                    borderColor: '#059669',
                    borderWidth: 2,
                    borderRadius: 8
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true,
                        ticks: { stepSize: 1 },
                        title: {
                            display: true,
                            text: 'Cantidad de obras',
                            font: { weight: 'bold' }
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `Obras: ${context.raw}`;
                            }
                        }
                    }
                }
            }
        });

        // Gráfica de usuarios
        const usuariosData = @json($obrasPorUsuario);
        const ctxUsuarios = document.getElementById('graficoUsuarios').getContext('2d');
        new Chart(ctxUsuarios, {
            type: 'doughnut',
            data: {
                labels: usuariosData.map(item => item.user ? item.user.name : 'Sistema'),
                datasets: [{
                    data: usuariosData.map(item => item.total),
                    backgroundColor: ['#8B5CF6', '#EC4899', '#06B6D4', '#F59E0B', '#EF4444'],
                    borderWidth: 2,
                    borderColor: '#fff'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.raw || 0;
                                return `${label}: ${value} obras`;
                            }
                        }
                    }
                }
            }
        });
    });
</script>

<style>
    canvas {
        max-height: 300px;
        width: 100% !important;
    }
    
    .container {
        max-width: 1200px;
    }
    
    table th, table td {
        padding: 12px;
    }
</style>
@endsection