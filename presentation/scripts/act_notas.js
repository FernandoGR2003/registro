document.addEventListener('DOMContentLoaded', () => {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const id = urlParams.get('id_nota');

    if (id) {
        loadNota(id);
    }

    const form = document.getElementById('update-nota-form');

    form.addEventListener('submit', async (event) => {
        event.preventDefault();
        updateNota();
    });
});

async function loadNota(id) {
    try {
        const response = await fetch(`http://registro.test/businessLogic/swnotas.php?id=${id}`);
        if (!response.ok) {
            throw new Error('Error al obtener la nota');
        }

        const nota = await response.json();
        document.getElementById('id').value = nota.id;
        document.getElementById('nombre_estudiante').value = nota.nombre_estudiante;
        document.getElementById('nota_materia_1').value = nota.nota_materia_1;
        document.getElementById('nota_materia_2').value = nota.nota_materia_2;
        document.getElementById('nota_materia_3').value = nota.nota_materia_3;
        document.getElementById('nota_materia_4').value = nota.nota_materia_4;
        document.getElementById('nota_materia_5').value = nota.nota_materia_5;
    } catch (error) {
        console.error('Error al cargar la nota:', error);
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Hubo un error al cargar la nota',
            confirmButtonText: 'Aceptar'
        });
    }
}

async function updateNota() {
    const id = document.getElementById('id').value;
    const nombreEstudiante = document.getElementById('nombre_estudiante').value;
    const notaMateria1 = parseFloat(document.getElementById('nota_materia_1').value);
    const notaMateria2 = parseFloat(document.getElementById('nota_materia_2').value);
    const notaMateria3 = parseFloat(document.getElementById('nota_materia_3').value);
    const notaMateria4 = parseFloat(document.getElementById('nota_materia_4').value);
    const notaMateria5 = parseFloat(document.getElementById('nota_materia_5').value);

    const nota = {
        action: 'update',
        id: id,
        nombre_estudiante: nombreEstudiante,
        nota_materia_1: notaMateria1,
        nota_materia_2: notaMateria2,
        nota_materia_3: notaMateria3,
        nota_materia_4: notaMateria4,
        nota_materia_5: notaMateria5
    };

    try {
        const response = await fetch('http://registro.test/businessLogic/swnotas.php', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(nota)
        });

        const result = await response.json();

        if (result.success) {
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: result.message,
                confirmButtonText: 'Aceptar'
            }).then(() => {
                window.location.href = 'list_notas.php';
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
        console.error('Error al actualizar la nota:', error);
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Hubo un error al actualizar la nota',
            confirmButtonText: 'Aceptar'
        });
    }
}
