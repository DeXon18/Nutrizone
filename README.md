# Nutrizone 🍏

![Nutrizone Banner](https://i.imgur.com/bDpHj2C.png)

**Planificación nutricional inteligente y personalizada**
_Aplicación web para gestión de alimentación, cálculo de macros y seguimiento de progreso_

[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)
![Laravel](https://img.shields.io/badge/Laravel-10.x-red.svg)
![Vue.js](https://img.shields.io/badge/Vue.js-3.x-green.svg)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-16-blue.svg)

---

## 🌟 Visión

Convertirnos en la plataforma de referencia para la planificación nutricional personalizada en español e inglés, combinando herramientas profesionales con una experiencia de usuario intuitiva.

---

## 🚀 Características Principales

### 📊 Perfil Inteligente

- Cálculo automático de necesidades calóricas (fórmula Mifflin-St Jeor)
- Gestión de alergias/intolerancias alimentarias
- Ajuste dinámico basado en métricas corporales

### 🍎 Base de Conocimiento

- +8,000 alimentos de USDA FoodData Central
- Búsqueda avanzada con filtros (sin gluten, vegano, etc.)
- Detalles nutricionales por 100g

### 👨‍🍳 Gestor de Recetas

- Editor interactivo con cálculo automático de macros
- Sistema de valoración y comentarios
- Modo público/privado para compartir

### 📅 Planificador Semanal

- Interfaz drag-and-drop para comidas
- Resumen diario de macros vs objetivos
- Generación automática de listas de compra

### 📈 Seguimiento

- Registro de métricas corporales con gráficos
- Galería privada de fotos de progreso
- Recordatorios personalizados

---

## 🛠 Stack Tecnológico

| Capa              | Tecnologías                                       |
| ----------------- | ------------------------------------------------- |
| **Backend**       | Laravel 10, PHP 8.3                               |
| **Frontend**      | Vue.js 3, Tailwind CSS, Chart.js                  |
| **Base de Datos** | PostgreSQL 16 (Modelo relacional optimizado)      |
| **Servidor**      | Nginx + PHP-FPM (Ubuntu 24.04 LTS en LXC/Proxmox) |
| **DevOps**        | Git + GitHub, Composer, npm                       |

---

## 📦 Instalación

### Requisitos previos

- PHP 8.3+
- PostgreSQL 16
- Composer 2.5+
- Node.js 18+

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
nano .env  # Configurar DB y otras variables

# Migrar base de datos
php artisan migrate --seed

# Compilar assets
npm run build

# Iniciar servidor de desarrollo
php artisan serve
```

## 📂 Estructura del Proyecto

```plaintext
nutrizone/
├── app/                 # Lógica de backend
│   ├── Models/          # User.php, Food.php, Recipe.php
│   ├── Calculators/     # NutritionCalculator.php
│   └── Http/            # Controllers, Middleware
├── config/              # Configuraciones Laravel
├── database/
│   ├── migrations/      # Esquemas de base de datos
│   └── seeders/         # Datos iniciales (USDA Foods)
├── public/              # Assets compilados
├── resources/
│   ├── js/              # Componentes Vue
│   │   └── Calculator/  # Componentes de cálculo
│   ├── lang/            # Traducciones (es/en)
│   └── views/           # Blade templates
├── routes/
│   ├── api.php          # Endpoints API
│   └── web.php          # Rutas principales
└── storage/
    └── app/
        └── progress_photos/  # Fotos de usuarios (privado)
```

**Key Paths:**

- `app/Calculators/NutritionCalculator.php` - Lógica de fórmulas nutricionales
- `database/seeders/FoodSeeder.php` - Importación de datos USDA
- `resources/js/components/Planner.vue` - Planificador drag-and-drop
