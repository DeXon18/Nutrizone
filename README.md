# Nutrizone 🍏

**Planificación nutricional inteligente y personalizada**
_Aplicación web para gestión de alimentación, cálculo de macros y seguimiento de progreso._

[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)
![Laravel](https://img.shields.io/badge/Laravel-12.x-red.svg)
![Vue.js](https://img.shields.io/badge/Vue.js-3.x-green.svg)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-16-blue.svg)

---

## 🌟 Visión

Convertirnos en la plataforma de referencia para la planificación nutricional personalizada en español e inglés, combinando herramientas profesionales con una experiencia de usuario intuitiva.

---

## Estado del Proyecto

**Última actualización: 8 de Julio de 2024**

El proyecto ha completado su fase de cimentación (Fase 0) y las tareas fundamentales de la Fase 1. La aplicación cuenta con una base funcional que incluye un sistema de autenticación seguro y un perfil de usuario extendido, todo servido sobre HTTPS.

---

## 🗺️ Hoja de Ruta (Roadmap) y Progreso

### Fase 0: Cimientos y Configuración

-   [x] Configuración de servidor (Nginx, PHP 8.3, PostgreSQL 16)
-   [x] Creación del proyecto Laravel 12 y Git
-   [x] Conexión a la Base de Datos y configuración de Nginx

### Fase 1: El Esqueleto Funcional

-   [x] Sistema de autenticación (Registro, Login, Logout) con Laravel Breeze
-   [x] Migraciones y modelo para perfil de usuario extendido (edad, peso, etc.)
-   [ ] Lógica del motor de cálculo de macros
-   [ ] Sistema de localización (i18n) para es/en

### Fase 2: El Contenido y las Recetas

-   [ ] Modelo y migración para `Food` e importación de USDA
-   [ ] Buscador de alimentos
-   [ ] CRUD de `Recipe` y su relación con `Food`

### Fase 3: La Herramienta Estrella

-   [ ] Interfaz del planificador semanal
-   [ ] Lógica de frontend (Vue.js) para drag-and-drop
-   [ ] Endpoints de API para el planificador

### Fase 4: Seguimiento y Finalización

-   [ ] Módulo de métricas y gráficos
-   [ ] Módulo de subida segura de fotos
-   [ ] Revisión de UI/UX y traducciones

---

## 🚀 Características Principales (Planificadas)

### 📊 Perfil Inteligente

-   Cálculo automático de necesidades calóricas (fórmula Mifflin-St Jeor)
-   Gestión de alergias/intolerancias alimentarias
-   Ajuste dinámico basado en métricas corporales

### 🍎 Base de Conocimiento

-   +8,000 alimentos de USDA FoodData Central
-   Búsqueda avanzada con filtros (sin gluten, vegano, etc.)
-   Detalles nutricionales por 100g

### 👨‍🍳 Gestor de Recetas

-   Editor interactivo con cálculo automático de macros
-   Sistema de valoración y comentarios
-   Modo público/privado para compartir

### 📅 Planificador Semanal

-   Interfaz drag-and-drop para comidas
-   Resumen diario de macros vs objetivos
-   Generación automática de listas de compra

### 📈 Seguimiento

-   Registro de métricas corporales con gráficos
-   Galería privada de fotos de progreso
-   Recordatorios personalizados

---

## 🛠 Stack Tecnológico

| Capa              | Tecnologías                                       |
| ----------------- | ------------------------------------------------- |
| **Backend**       | Laravel 12, PHP 8.3                               |
| **Frontend**      | Vue.js 3, Tailwind CSS, Chart.js                  |
| **Base de Datos** | PostgreSQL 16 (Modelo relacional optimizado)      |
| **Servidor**      | Nginx + PHP-FPM (Ubuntu 24.04 LTS en LXC/Proxmox) |
| **DevOps**        | Git + GitHub, Composer, npm                       |

---

## 📦 Instalación

### Requisitos previos

-   PHP 8.3+
-   PostgreSQL 16
-   Composer
-   Node.js 18+

### Pasos

```bash
# Clonar repositorio
git clone https://github.com/DeXon18/Nutrizone.git
cd Nutrizone

# Instalar dependencias
composer install
npm install

# Configurar entorno (copiar .env.example)
cp .env.example .env
# Configurar DB y APP_URL en .env
nano .env

# Generar clave de aplicación
php artisan key:generate

# Migrar base de datos
php artisan migrate

# Compilar assets
npm run build
```
