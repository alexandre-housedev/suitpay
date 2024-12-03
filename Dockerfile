# Imagem oficial do PHP
FROM php:8.2-fpm

# Instale dependências necessárias
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Instale o Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Configure o diretório de trabalho
WORKDIR /var/www

# Copie o código do Laravel
COPY . /var/www

# Copie o arquivo .env-producao ou .env.-homologacao e renomeia para .env
RUN cp .env-homologacao .env

# Instale dependências do Laravel
RUN composer install

# Gerar a chave do Laravel
RUN php artisan key:generate

# Ajuste permissões
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Exponha a porta
EXPOSE 8000

# Comando inicial
CMD ["php-fpm"]
