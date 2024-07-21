document.addEventListener('DOMContentLoaded', () => {
    loadNotas();

    const addNotaBtn = document.getElementById('add-nota-btn');
    addNotaBtn.addEventListener('click', () => {
        window.location.href = 'add_notas.php';
    });
});

async function loadNotas() {
    try {
        const response = await fetch('http://registro.test/businessLogic/swnotas.php');
        if (!response.ok) {
            throw new Error('Error al obtener las notas');
        }

        const notas = await response.json();
        displayNotas(notas);
    } catch (error) {
        console.error('Error al cargar las notas:', error);
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Hubo un error al cargar las notas',
            confirmButtonText: 'Aceptar'
        });
    }
}

function displayNotas(notas) {
    const notasBody = document.getElementById('notas-body');
    notasBody.innerHTML = '';

    notas.forEach(nota => {
        const row = document.createElement('tr');

        const idCell = document.createElement('td');
        idCell.textContent = nota.id;
        idCell.classList.add('px-6', 'py-4', 'whitespace-no-wrap', 'border-b', 'border-gray-300', 'text-sm', 'leading-5', 'font-medium', 'text-gray-700');
        
        const nombreCell = document.createElement('td');
        nombreCell.textContent = nota.nombre_estudiante;
        nombreCell.classList.add('px-6', 'py-4', 'whitespace-no-wrap', 'border-b', 'border-gray-300', 'text-sm', 'leading-5', 'text-gray-700');

        const nota1Cell = document.createElement('td');
        nota1Cell.textContent = nota.nota_materia_1;
        nota1Cell.classList.add('px-6', 'py-4', 'whitespace-no-wrap', 'border-b', 'border-gray-300', 'text-sm', 'leading-5', 'text-gray-700');

        const nota2Cell = document.createElement('td');
        nota2Cell.textContent = nota.nota_materia_2;
        nota2Cell.classList.add('px-6', 'py-4', 'whitespace-no-wrap', 'border-b', 'border-gray-300', 'text-sm', 'leading-5', 'text-gray-700');

        const nota3Cell = document.createElement('td');
        nota3Cell.textContent = nota.nota_materia_3;
        nota3Cell.classList.add('px-6', 'py-4', 'whitespace-no-wrap', 'border-b', 'border-gray-300', 'text-sm', 'leading-5', 'text-gray-700');

        const nota4Cell = document.createElement('td');
        nota4Cell.textContent = nota.nota_materia_4;
        nota4Cell.classList.add('px-6', 'py-4', 'whitespace-no-wrap', 'border-b', 'border-gray-300', 'text-sm', 'leading-5', 'text-gray-700');

        const nota5Cell = document.createElement('td');
        nota5Cell.textContent = nota.nota_materia_5;
        nota5Cell.classList.add('px-6', 'py-4', 'whitespace-no-wrap', 'border-b', 'border-gray-300', 'text-sm', 'leading-5', 'text-gray-700');

        const promedioCell = document.createElement('td');
        promedioCell.textContent = nota.promedio;
        promedioCell.classList.add('px-6', 'py-4', 'whitespace-no-wrap', 'border-b', 'border-gray-300', 'text-sm', 'leading-5', 'text-gray-700');

        const accionesCell = document.createElement('td');
        accionesCell.classList.add('px-6', 'py-4', 'whitespace-no-wrap', 'border-b', 'border-gray-300', 'text-sm', 'leading-5', 'font-medium', 'text-gray-700');
        
        const editarBtn = document.createElement('button');
        editarBtn.textContent = 'Editar';
        editarBtn.classList.add('bg-blue-500', 'text-white', 'px-4', 'py-2', 'rounded-md', 'shadow-sm', 'hover:bg-blue-700', 'focus:outline-none', 'focus:ring-2', 'focus:ring-offset-2', 'focus:ring-blue-500', 'mr-2');
        editarBtn.addEventListener('click', () => {
            editNota(nota.id);
        });

        const eliminarBtn = document.createElement('button');
        eliminarBtn.textContent = 'Eliminar';
        eliminarBtn.classList.add('bg-red-500', 'text-white', 'px-4', 'py-2', 'rounded-md', 'shadow-sm', 'hover:bg-red-700', 'focus:outline-none', 'focus:ring-2', 'focus:ring-offset-2', 'focus:ring-red-500');
        eliminarBtn.addEventListener('click', () => {
            confirmDeleteNota(nota.id);
        });

        accionesCell.appendChild(editarBtn);
        accionesCell.appendChild(eliminarBtn);

        row.appendChild(idCell);
        row.appendChild(nombreCell);
        row.appendChild(nota1Cell);
        row.appendChild(nota2Cell);
        row.appendChild(nota3Cell);
        row.appendChild(nota4Cell);
        row.appendChild(nota5Cell);
        row.appendChild(promedioCell);
        row.appendChild(accionesCell);

        notasBody.appendChild(row);
    });
}

function editNota(idNota) {
    window.location.href = `./act_notas.php?id_nota=${idNota}`;
}

function confirmDeleteNota(idNota) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "Esta acción no se puede deshacer.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminarlo'
    }).then((result) => {
        if (result.isConfirmed) {
            deleteNota(idNota);
        }
    });
}

async function deleteNota(idNota) {
    try {
        const response = await fetch(`http://registro.test/businessLogic/swnotas.php?id=${idNota}`, {
            method: 'DELETE'
        });
        const result = await response.json();
        
        if (result.success) {
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: result.message,
                confirmButtonText: 'Aceptar'
            }).then(() => {
                window.location.reload();
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: result.message,
                confirmButtonText: 'Aceptar'
            });
        }
    } catch (error) {
        console.error('Error al eliminar la nota:', error);
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Hubo un error al eliminar la nota',
            confirmButtonText: 'Aceptar'
        });
    }
}
