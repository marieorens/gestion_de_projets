# Utiliser une image PHP avec FPM
FROM php:8.1-fpm

# Installer les dépendances système nécessaires
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libzip-dev \
    libpq-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Définir le répertoire de travail à /app
WORKDIR /app

# Copier tous les fichiers du projet dans le répertoire /app du conteneur
COPY . /app/

# Installer les dépendances PHP avec Composer
RUN COMPOSER_MEMORY_LIMIT=-1 composer install --no-dev --optimize-autoloader

# Exécuter les migrations de la base de données
RUN php artisan migrate --force

# Corriger les permissions des dossiers Laravel
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache

# Exposer le port 8000 pour accéder à l'application
EXPOSE 8000

# Commande par défaut pour exécuter PHP-FPM
CMD ["php-fpm"]
