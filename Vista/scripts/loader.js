// Mostrar loader
function mostrarLoader() {
  const loader = document.getElementById("loader");
  if (loader) loader.classList.remove("hidden");
}

// Ocultar loader
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

// Mostrar toast de error
function mostrarToastError(mensaje) {
  const toast = document.getElementById("toast-error");
  if (toast) {
    toast.querySelector("p.text-sm").textContent = mensaje;
    toast.classList.remove("hidden");
    toast.classList.add("opacity-100");

    setTimeout(() => {
      toast.classList.add("opacity-0");
      setTimeout(() => {
        toast.classList.add("hidden");
        toast.classList.remove("opacity-100", "opacity-0");
      }, 300);
    }, 3500);
  }
}

document.addEventListener("DOMContentLoaded", () => {
  // Registro
  const formRegistro = document.getElementById("formRegistro");
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
        window.location.href = "login";
      } else {
        mostrarToastError("Error al registrar el usuario.");
      }
    });
  }

  // Login
  const formLogin = document.getElementById("formLogin");
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
        mostrarToastError("Credenciales incorrectas");
      }
    });
  }
});

// Ocultar loader al terminar de cargar la vista
window.addEventListener("load", () => {
  ocultarLoader();
});
