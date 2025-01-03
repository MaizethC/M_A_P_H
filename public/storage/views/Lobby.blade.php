@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mi App</title>
  <!-- Tailwind CSS desde CDN -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
  <!-- Barra de navegación -->
  <nav class="bg-white shadow-lg">
    <div class="max-w-6xl mx-auto px-4">
      <div class="flex justify-between">
        <div class="flex space-x-7">
          <a href="/" class="flex items-center py-4 px-2">
            <span class="font-semibold text-gray-500 text-lg">MAPH</span>
          </a>
        </div>
        <div class="hidden md:flex items-center space-x-1">
          <a
            href="/funcionalidad1"
            class="py-4 px-2 text-gray-500 font-semibold hover:text-blue-500 transition duration-300"
          >
            Funcionalidad 1
          </a>
          <a
            href="/funcionalidad2"
            class="py-4 px-2 text-gray-500 font-semibold hover:text-blue-500 transition duration-300"
          >
            Funcionalidad 2
          </a>
          <a
            href="/funcionalidad3"
            class="py-4 px-2 text-gray-500 font-semibold hover:text-blue-500 transition duration-300"
          >
            Funcionalidad 3
          </a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Sección principal (Hero) -->
  <section class="bg-gray-100 py-20">
    <div class="max-w-4xl mx-auto text-center">
      <h1 class="text-5xl font-bold text-gray-800 mb-6">Bienvenido a Mi App</h1>
      <p class="text-xl text-gray-600 mb-8">
        Una solución moderna y minimalista para tus necesidades.
      </p>
      <a
        href="/funcionalidad1"
        class="bg-blue-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-600 transition duration-300"
      >
        Comenzar
      </a>
    </div>
  </section>

  <!-- Funcionalidades destacadas -->
  <section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Funcionalidades Principales</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-gray-50 p-6 rounded-lg shadow-md">
          <h3 class="text-xl font-semibold text-gray-800 mb-4">Funcionalidad 1</h3>
          <p class="text-gray-600">Descripción breve de la funcionalidad 1.</p>
        </div>
        <div class="bg-gray-50 p-6 rounded-lg shadow-md">
          <h3 class="text-xl font-semibold text-gray-800 mb-4">Funcionalidad 2</h3>
          <p class="text-gray-600">Descripción breve de la funcionalidad 2.</p>
        </div>
        <div class="bg-gray-50 p-6 rounded-lg shadow-md">
          <h3 class="text-xl font-semibold text-gray-800 mb-4">Funcionalidad 3</h3>
          <p class="text-gray-600">Descripción breve de la funcionalidad 3.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Pie de página -->
  <footer class="bg-gray-800 text-white py-8">
    <div class="max-w-6xl mx-auto px-4">
      <div class="text-center">
        <p class="text-sm">
          &copy; <span id="year"></span> Mi App. Todos los derechos reservados.
        </p>
      </div>
    </div>
  </footer>

  <!-- Script para el año actual -->
  <script>
    document.getElementById("year").textContent = new Date().getFullYear();
  </script>
</body>
</html>

@endsection
