function mostrarLoader() {
  const loader = document.getElementById("loader");
  if (loader) loader.classList.remove("hidden");
}

function ocultarLoader() {
  const loader = document.getElementById("loader");
  if (loader) {
    loader.style.opacity = "0";
    setTimeout(() => {
      loader.classList.add("hidden");
      loader.style.opacity = "1";
    }, 300);
  }
}

function mostrarToast({ tipo = "info", titulo = "", mensaje = "" }) {
  const toast = document.getElementById("toast-global");
  const titleEl = document.getElementById("toast-title");
  const messageEl = document.getElementById("toast-message");

  const estilos = {
    success: {
      fondo: "bg-green-100",
      texto: "text-green-800",
      borde: "border-green-600",
    },
    error: {
      fondo: "bg-red-100",
      texto: "text-red-800",
      borde: "border-red-600",
    },
    warning: {
      fondo: "bg-yellow-100",
      texto: "text-yellow-800",
      borde: "border-yellow-600",
    },
    info: {
      fondo: "bg-blue-100",
      texto: "text-blue-800",
      borde: "border-blue-600",
    },
  };

  toast.className = "fixed top-5 right-5 z-50 flex items-start gap-4 p-4 border-l-4 shadow-lg rounded-lg hidden opacity-0 transition-opacity duration-300";

  const estilo = estilos[tipo] || estilos.info;

  toast.classList.add(estilo.fondo, estilo.texto, estilo.borde);

  titleEl.textContent = titulo;
  messageEl.textContent = mensaje;

  toast.classList.remove("hidden");
  toast.classList.add("opacity-100");

  setTimeout(() => {
    toast.classList.remove("opacity-100");
    toast.classList.add("opacity-0");
    setTimeout(() => toast.classList.add("hidden"), 300);
  }, 3500);
}

document.addEventListener("DOMContentLoaded", () => {
  const formLogin = document.getElementById("formLogin");
  const formRegistro = document.getElementById("formRegistro");

  if (formLogin) {
    formLogin.addEventListener("submit", async (e) => {
      e.preventDefault();
      mostrarLoader();

      const datos = new FormData(formLogin);
      const res = await fetch("Controlador/Usuario.php?op=login", {
        method: "POST",
        body: datos,
      });
      const data = await res.json();
      ocultarLoader();

      if (data.success) {
        window.location.href = "dashboard";
      } else {
        mostrarToast({
          tipo: "error",
          titulo: "Error",
          mensaje: "Credenciales incorrectas",
        });
      }
    });
  }

  if (formRegistro) {
    formRegistro.addEventListener("submit", async (e) => {
      e.preventDefault();
      mostrarLoader();

      const datos = new FormData(formRegistro);
      const res = await fetch("Controlador/Usuario.php?op=registrar", {
        method: "POST",
        body: datos,
      });
      const data = await res.json();
      ocultarLoader();

      if (data.success) {
        mostrarToast({
          tipo: "success",
          titulo: "Registro exitoso",
          mensaje: "Usuario registrado correctamente",
        });
        setTimeout(() => (window.location.href = "login"), 1500);
      } else {
        mostrarToast({
          tipo: "error",
          titulo: "Error",
          mensaje: "No se pudo registrar el usuario",
        });
      }
    });
  }

  // DATATABLE para tabla de usuarios
  const tablaUsuarios = document.getElementById("tablaUsuarios");
  if (tablaUsuarios) {
    $(tablaUsuarios).DataTable({
      ajax: {
        url: "Controlador/Usuario.php?op=listar",
        dataSrc: "",
      },
      columns: [
        { data: "id" },
        { data: "nombre" },
        { data: "correo" },
        {
          data: null,
          render: function (data, type, row) {
            return `
              <div class="flex gap-2">
                <button onclick="editarUsuario(${row.id})" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-xs">
                  <i class="fas fa-edit"></i>
                </button>
                <button onclick="desactivarUsuario(${row.id})" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">
                  <i class="fas fa-ban"></i> 
                </button>
              </div>
            `;
          },
          orderable: false,
          searchable: false
        }
      ],
      responsive: true,
      dom: "<'flex flex-wrap items-center justify-between mb-4'Bf>" +
        "<'overflow-x-auto't>" +
        "<'flex items-center justify-between mt-4'p>",
      buttons: [
        {
          extend: "excelHtml5",
          text: '<i class="fas fa-file-excel"></i>',
          titleAttr: 'Exportar a Excel',
          className: 'btn-excel'
        },
        {
          extend: "pdfHtml5",
          text: '<i class="fas fa-file-pdf"></i>',
          titleAttr: 'Exportar a PDF',
          className: 'btn-pdf'
        },
        {
          extend: "print",
          text: '<i class="fas fa-print"></i>',
          titleAttr: 'Imprimir',
          className: 'btn-print'
        }
      ],
      language: {
        url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
      }
    });
  }
});

function editarUsuario(id) {
  // Aquí llamas a tu lógica para mostrar modal o formulario
  console.log("Editar usuario:", id);
  // mostrarFormularioEdicion(id); // ejemplo
}

function desactivarUsuario(id) {
  Swal.fire({
    title: '¿Estás seguro?',
    text: "El usuario será desactivado",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Sí, desactivar'
  }).then((result) => {
    if (result.isConfirmed) {
      fetch(`Controlador/Usuario.php?op=desactivar&id=${id}`)
        .then(res => res.json())
        .then(data => {
          if (data.success) {
            mostrarToast({
              tipo: "success",
              titulo: "Desactivado",
              mensaje: "Usuario desactivado correctamente"
            });
            $('#tablaUsuarios').DataTable().ajax.reload();
          } else {
            mostrarToast({
              tipo: "error",
              titulo: "Error",
              mensaje: "No se pudo desactivar el usuario"
            });
          }
        });
    }
  });
}

function editarUsuario(id) {
  // Traer datos del usuario
  fetch(`Controlador/Usuario.php?op=mostrar&id=${id}`)
    .then(res => res.json())
    .then(data => {
      if (data) {
        document.getElementById('editar_id').value = data.id;
        document.getElementById('editar_nombre').value = data.nombre;
        document.getElementById('editar_correo').value = data.correo;
        document.getElementById('modalEditarUsuario').classList.remove('hidden');
      } else {
        mostrarToast({
          tipo: "error",
          titulo: "Error",
          mensaje: "No se pudo cargar el usuario"
        });
      }
    });
}

function cerrarModalEditar() {
  document.getElementById('modalEditarUsuario').classList.add('hidden');
}

document.getElementById('formEditarUsuario').addEventListener('submit', async (e) => {
  e.preventDefault();
  mostrarLoader();

  const datos = new FormData(e.target);
  const res = await fetch("Controlador/Usuario.php?op=editar", {
    method: "POST",
    body: datos
  });
  const data = await res.json();
  ocultarLoader();

  if (data.success) {
    mostrarToast({
      tipo: "success",
      titulo: "Actualizado",
      mensaje: "Usuario editado correctamente"
    });
    cerrarModalEditar();
    $('#tablaUsuarios').DataTable().ajax.reload();
  } else {
    mostrarToast({
      tipo: "error",
      titulo: "Error",
      mensaje: "No se pudo editar el usuario"
    });
  }
});

