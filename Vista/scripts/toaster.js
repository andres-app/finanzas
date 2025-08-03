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
  
    // Resetear clases previas
    toast.className = "fixed top-5 right-5 z-50 flex items-start gap-4 p-4 border-l-4 shadow-lg rounded-lg hidden opacity-0 transition-opacity duration-300";
  
    const estilo = estilos[tipo] || estilos.info;
  
    toast.classList.add(estilo.fondo, estilo.texto, estilo.borde);
  
    titleEl.textContent = titulo;
    messageEl.textContent = mensaje;
  
    toast.classList.remove("hidden");
    toast.classList.add("opacity-100");
  
    // Ocultar después de 3.5s
    setTimeout(() => {
      toast.classList.remove("opacity-100");
      toast.classList.add("opacity-0");
  
      setTimeout(() => {
        toast.classList.add("hidden");
      }, 300);
    }, 3500);
  }
  