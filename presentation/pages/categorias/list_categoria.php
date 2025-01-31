
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Categorías de Productos</title>
  <link rel="stylesheet" href="../../styles/tailwind.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
  <!-- Contenido Principal -->
  <main class="container mx-auto mt-8">
    <h2 class="text-2xl font-bold mb-4 text-gray-800">Categorías de Productos</h2>

    <!-- Botón para agregar nueva categoría -->
    <div class="mb-4">
      <button onclick="window.location.href='./add_categoria.php'" class="bg-green-500 text-white px-4 py-2 rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 font-bold">
        Agregar Nueva Categoría
      </button>
    </div>

    <!-- Lista de Categorías -->
    <div id="categorias-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
      <!-- Las categorías se cargarán aquí dinámicamente -->
    </div>
  </main>

  <!-- Pie de Página -->
  <footer class="bg-blue-800 p-4 text-center text-white font-bold">
    <p>Espoch todos los derechos reservados © 2024</p>
  </footer>
  <script src="../../scripts/list_categoria.js"></script>
</body>
</html>
