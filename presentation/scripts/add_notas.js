document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('add-nota-form');

    form.addEventListener('submit', async (event) => {
        event.preventDefault();
        addNota();
    });
});

async function addNota() {
    const nombreEstudiante = document.getElementById('nombre_estudiante').value;
    const notaMateria1 = parseFloat(document.getElementById('nota_materia_1').value);
    const notaMateria2 = parseFloat(document.getElementById('nota_materia_2').value);
    const notaMateria3 = parseFloat(document.getElementById('nota_materia_3').value);
    const notaMateria4 = parseFloat(document.getElementById('nota_materia_4').value);
    const notaMateria5 = parseFloat(document.getElementById('nota_materia_5').value);

    const nota = {
        action: 'create',
        nombre_estudiante: nombreEstudiante,
        nota_materia_1: notaMateria1,
        nota_materia_2: notaMateria2,
        nota_materia_3: notaMateria3,
        nota_materia_4: notaMateria4,
        nota_materia_5: notaMateria5
    };

    try {
        const response = await fetch('http://registro.test/businessLogic/swnotas.php', {
            method: 'POST',
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
        console.error('Error al añadir la nota:', error);
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Hubo un error al añadir la nota',
            confirmButtonText: 'Aceptar'
        });
    }
}
