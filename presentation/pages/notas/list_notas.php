<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listado de Notas</title>
  <link rel="stylesheet" href="../../styles/tailwind.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }
    main {
        flex: 1;
    }
  </style>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
  <!-- Contenido Principal -->
  <main class="container mx-auto mt-8">
    <div class="flex justify-between items-center mb-4">
      <h2 class="text-2xl font-bold text-gray-800">Notas</h2>
      <button id="add-nota-btn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        Añadir Nota
      </button>
    </div>

    <!-- Tabla de Notas -->
    <div class="overflow-x-auto">
      <table class="min-w-full bg-white border-gray-300 shadow-md rounded-md overflow-hidden">
        <thead class="bg-gray-200">
          <tr>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 font-medium text-gray-700 uppercase tracking-wider">ID</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 font-medium text-gray-700 uppercase tracking-wider">Nombre Estudiante</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 font-medium text-gray-700 uppercase tracking-wider">Nota Materia 1</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 font-medium text-gray-700 uppercase tracking-wider">Nota Materia 2</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 font-medium text-gray-700 uppercase tracking-wider">Nota Materia 3</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 font-medium text-gray-700 uppercase tracking-wider">Nota Materia 4</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 font-medium text-gray-700 uppercase tracking-wider">Nota Materia 5</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 font-medium text-gray-700 uppercase tracking-wider">Promedio</th>
            <th class="px-6 py-3 border-b-2 border-gray-300"></th>
          </tr>
        </thead>
        <tbody id="notas-body">
          <!-- Filas de notas se cargarán aquí dinámicamente -->
        </tbody>
      </table>
    </div>
  </main>
  <!-- Pie de Página -->
  <footer class="bg-blue-800 p-4 text-center text-white">
    <p>Espoch todos los derechos reservados © 2024</p>
  </footer>
  <script src="../../scripts/list_notas.js"></script>
</body>
</html>
