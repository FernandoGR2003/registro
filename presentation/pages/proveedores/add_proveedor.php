<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agregar Nuevo Proveedor</title>
  <link rel="stylesheet" href="../../styles/tailwind.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
  <main class="container mx-auto mt-8">
    <h2 class="text-2xl font-bold mb-4 text-gray-800">Agregar Nuevo Proveedor</h2>

    <form id="form-agregar-proveedor" class="max-w-lg bg-white p-6 rounded-lg shadow-md mx-auto">
      <div class="mb-4">
        <label for="nombre" class="block text-gray-700 font-bold mb-2">Nombre del Proveedor</label>
        <input type="text" id="nombre" name="nombre" class="border rounded-md px-4 py-2 w-full">
      </div>
      <div class="mb-4">
        <label for="contacto" class="block text-gray-700 font-bold mb-2">Contacto</label>
        <input type="text" id="contacto" name="contacto" class="border rounded-md px-4 py-2 w-full">
      </div>
      <div class="mb-4">
        <label for="terminos" class="block text-gray-700 font-bold mb-2">Términos de Negociación</label>
        <textarea id="terminos" name="terminos" class="border rounded-md px-4 py-2 w-full" rows="4"></textarea>
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Productos:</label>
        <div id="productos-checkbox-list"></div>
      </div>
      <div class="mb-4">
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 font-bold">
          Guardar Proveedor
        </button>
      </div>
    </form>
  </main>

  <footer class="bg-blue-800 p-4 text-center text-white font-bold">
    <p>Espoch todos los derechos reservados © 2024</p>
  </footer>
  <script src="../../scripts/add_proveedor.js"></script>
</body>
</html>
