# Fase 1: Compilar los activos estáticos usando una imagen de Node.js
FROM node:16 AS node-build

# Establecer el directorio de trabajo para la compilación de los activos
WORKDIR /app

# Copiar los archivos del proyecto
COPY package.json package-lock.json /app/

# Instalar dependencias de npm
RUN npm install

# Copiar el resto de los archivos del proyecto
COPY . /app

# Compilar los activos para dev
RUN npm run dev

# Fase 2: Imagen de PHP-FPM
FROM php:8.2-fpm

# Instalar las dependencias necesarias
RUN apt update && apt install -y \
    git \
    unzip \
    libpq-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
    zip \
    nano \
    cron \
    procps \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql gd zip

# Instalar Composer
COPY --from=composer:2.1 /usr/bin/composer /usr/bin/composer

# Configurar el directorio de trabajo
WORKDIR /app

# Copiar los archivos del proyecto desde la fase anterior
COPY . /app

# Copiar los activos compilados de la fase de Node.js
COPY --from=node-build /app/public /app/public
COPY --from=node-build /app/node_modules /app/node_modules

# Copiar el crontab y el script de inicio
COPY start.sh /usr/local/bin/start.sh

# Instalar las dependencias de Composer
RUN composer install --no-dev --optimize-autoloader --prefer-dist

# Cambiar permisos
RUN chown -R www-data:www-data storage bootstrap/cache
RUN chmod -R 755 storage bootstrap/cache
RUN chmod +x /usr/local/bin/start.sh

# Limpiar instalación de apt
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Exponer el puerto
EXPOSE 9000

# Comando para iniciar PHP-FPM en el contenedor
CMD ["/usr/local/bin/start.sh"]
