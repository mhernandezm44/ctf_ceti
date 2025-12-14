import os
import shutil
import stat
import subprocess
import threading
import atexit
import signal
import sys

# ==============================
# Configuración
# ==============================
REPO_URL = "https://github.com/mhernandezm44/ctf_ceti"
DESTINO = r"C:\Users\Usuario\Desktop\ctf_ceti"

# ==============================
# Funciones de ayuda
# ==============================
def eliminar_forzado(ruta):
    """Eliminar carpeta incluso si contiene archivos de solo lectura"""
    def onerror(func, path, exc_info):
        os.chmod(path, stat.S_IWRITE)
        func(path)
    shutil.rmtree(ruta, onerror=onerror)

def ejecutar_docker(carpeta):
    # Busca docker-compose.yml solo dentro de la carpeta y lo ejecuta en background
    ruta_completa = os.path.join(DESTINO, carpeta)
    
    docker_compose_file = os.path.join(ruta_completa, "docker-compose.yml")
    if os.path.isfile(docker_compose_file):
        print(f"[{carpeta}] Encontrado docker-compose.yml, ejecutando...")
        try:
            subprocess.Popen(
                ["docker-compose", "-f", docker_compose_file, "up"],
                cwd=ruta_completa
            )
            procesos_activos.append(ruta_completa)
        except Exception as e:
            print(f"[{carpeta}] Error al ejecutar docker-compose: {e}")
    else:
        print(f"[{carpeta}] No se encontró docker-compose.yml en la carpeta.")

def limpiar_docker():
    # Ejecuta docker-compose down en todas las carpetas levantadas
    print("\nLimpiando contenedores docker...")
    for carpeta in procesos_activos:
        try:
            subprocess.run(["docker-compose", "down"], cwd=carpeta)
            print(f"[{os.path.basename(carpeta)}] Contenedores bajados")
        except Exception as e:
            print(f"[{os.path.basename(carpeta)}] Error al bajar contenedores: {e}")

# ==============================
# Inicialización
# ==============================
procesos_activos = []

# Registrar limpieza al salir
atexit.register(limpiar_docker)

# Manejar Ctrl+C
def signal_handler(sig, frame):
    print("\nInterrupción detectada, limpiando contenedores...")
    limpiar_docker()
    sys.exit(0)

signal.signal(signal.SIGINT, signal_handler)

# ==============================
# Clonar repositorio
# ==============================
if os.path.exists(DESTINO):
    print("Eliminando carpeta existente...")
    eliminar_forzado(DESTINO)
    print("Carpeta eliminada correctamente.")

print("Clonando repositorio...")
subprocess.run(["git", "clone", REPO_URL, DESTINO], check=True)
print("Repositorio clonado correctamente.")

# ==============================
# Enumerar carpetas de primer nivel
# ==============================
primer_nivel = [
    nombre for nombre in os.listdir(DESTINO)
    if os.path.isdir(os.path.join(DESTINO, nombre)) and nombre != ".git"
]

print(f"Carpetas de primer nivel encontradas: {len(primer_nivel)}")
for carpeta in primer_nivel:
    print(f" - {carpeta}")

# ==============================
# Ejecutar docker-compose en cada carpeta de primer nivel
# ==============================
hilos = []
for carpeta in primer_nivel:
    hilo = threading.Thread(target=ejecutar_docker, args=(carpeta,))
    hilo.start()
    hilos.append(hilo)

print("Todos los docker-compose han sido lanzados (en background).")
print("Presiona Ctrl+C para detener y limpiar contenedores.")
