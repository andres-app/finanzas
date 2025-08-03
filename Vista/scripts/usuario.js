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
        url: "Controlador/Usuario.php?op=listar", // Ajusta esta ruta si es necesario
        dataSrc: "",
      },
      columns: [
        { data: "id" },
        { data: "nombre" },
        { data: "correo" },
      ],
      responsive: true,
      dom: "Bfrtip",
      buttons: [
        { extend: "excelHtml5", text: "Exportar a Excel" },
        { extend: "pdfHtml5", text: "Exportar a PDF" },
        { extend: "print", text: "Imprimir" }
      ],
      language: {
        url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
      }
    });
  }
});
