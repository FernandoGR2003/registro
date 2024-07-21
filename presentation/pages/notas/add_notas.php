<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Añadir Nota</title>
  <link rel="stylesheet" href="../../styles/tailwind.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal flex items-center justify-center h-screen">
  <!-- Contenido Principal -->
  <main class="w-full max-w-md">
    <h2 class="text-2xl font-bold mb-4 text-gray-800 text-center">Añadir Nota</h2>

    <!-- Formulario de Añadir Nota -->
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
      <form id="add-nota-form">
        <div class="mb-4">
          <label for="nombre_estudiante" class="block text-gray-700 text-sm font-bold mb-2">Nombre del Estudiante:</label>
          <input type="text" id="nombre_estudiante" name="nombre_estudiante" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
          <label for="nota_materia_1" class="block text-gray-700 text-sm font-bold mb-2">Nota Materia 1:</label>
          <input type="number" id="nota_materia_1" name="nota_materia_1" step="0.01" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
          <label for="nota_materia_2" class="block text-gray-700 text-sm font-bold mb-2">Nota Materia 2:</label>
          <input type="number" id="nota_materia_2" name="nota_materia_2" step="0.01" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
          <label for="nota_materia_3" class="block text-gray-700 text-sm font-bold mb-2">Nota Materia 3:</label>
          <input type="number" id="nota_materia_3" name="nota_materia_3" step="0.01" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
          <label for="nota_materia_4" class="block text-gray-700 text-sm font-bold mb-2">Nota Materia 4:</label>
          <input type="number" id="nota_materia_4" name="nota_materia_4" step="0.01" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
          <label for="nota_materia_5" class="block text-gray-700 text-sm font-bold mb-2">Nota Materia 5:</label>
          <input type="number" id="nota_materia_5" name="nota_materia_5" step="0.01" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="flex items-center justify-between">
          <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Añadir Nota</button>
        </div>
      </form>
    </div>
  </main>
  <!-- Pie de Página -->
  <footer class="bg-blue-800 p-4 text-center text-white w-full fixed bottom-0">
    <p>Espoch todos los derechos reservados © 2024</p>
  </footer>
  <script src="../../scripts/add_notas.js"></script>
</body>
</html>
