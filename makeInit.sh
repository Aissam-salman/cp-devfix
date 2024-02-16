#!/bin/bash
set -o allexport
source ./.env

print_error() {
  echo -e "\e[91mError: $1\e[0m" >&2
}
# Vérification de l'installation de Composer
if ! [ -x "$(command -v composer)" ]; then
  print_error "Composer is not installed."
  exit 1
fi

# Vérification de l'installation de Symfony CLI
if ! [ -x "$(command -v symfony)" ]; then
  print_error "Symfony CLI is not installed."
  exit 1
fi

# Vérification de l'installation de PHP
if ! [ -x "$(command -v php)" ]; then
  print_error "PHP is not installed."
  exit 1
fi

# Assurez-vous que Docker est installé
if ! [ -x "$(command -v docker)" ]; then
  print_error "Docker is not installed."
  exit 1
fi

# Assurez-vous que Docker Compose est installé
if ! [ -x "$(command -v docker compose)" ]; then
  print_error "Docker Compose is not installed."
  exit 1
fi

composer install

echo "Starting Docker containers..."
docker-compose up -d

echo "Wait... "
sleep 5

echo -e "\033[96mCreating database with test data...\033[0m"
sleep 2
echo -e "\033[96mInitializing database with test data...\033[0m"
sleep 2

echo "Wait create & init devfix database... "
echo "open localhost:7070 to check initalization"
sleep 10


if [ -x "$(command -v symfony)" ]; then
  echo "Starting Symfony application..."
  symfony server:start
else
  print_error "Symfony CLI is not available. Starting PHP built-in server..."
  php -S 127.0.0.1:8000 -t public/
fi
