# Workshop Laravelday 2025 - Federazione di Micro-Monoliti con SSO

Repository per il workshop "Federazione di Micro-Monoliti con SSO" organizzato dal Grusp a Verona il giorno 21 novembre
2025.

## Pre-requisiti per seguire il workshop

Per seguire il workshop sono indispensabili i seguenti strumenti applicativi.

- PHP 8+
- Docker
- Docker Compose (versione plugin)

## Istruzioni per l'installazione dell'applicazione

Per installare l'applicazione di esempio eseguire i seguenti comandi:

1. Clonazione del repository
```shell
git clone https://github.com/robertogallea/ws-laravel-micro-monoliths
```
2. Spostati all'interno del progetto
```shell
cd ws-laravel-micro-monoliths
```
3. Copia il file di env
```shell
cp .env.example .env
```
4. Installazione dipendenze composer
```shell
composer install
```
5. Genera una chiave di applicazione
```shell
php artisan key:generate
```
6. Creazione del database sqlite di test
```shell
touch database/database.sqlite
```
7. Migrazione e seeding del database
```shell
php artisan migrate:fresh --seed
```
8. Esecuzione dell'ambiente di sviluppo
```shell
php artisan serve
```

### Muoversi nel repository

Ogni commit del repository rappresenta una milestone del workshop.

Per spostarsi da un commit all'altro, eseguire il comando
```shell
git checkout <commit_hash>
```

Elenco degli hash dei commit:
- `54742f1` - Initial commit
