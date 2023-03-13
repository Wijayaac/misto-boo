# Misto Boo

Book Application apps for sorting and rate book based on the Votes

## The application requirement

    -   PHP 8.0 or later
    -   MySQL DB
    -   node js version 16 or later

## Installation

    - composer install
    - npm install && npm run dev

## Running the server

### Prepare database table & data

We assume the migration and seeder class already created so just need to run this command (bash only).

Notes:
If you are not using bash, you can copy the command inside db-fill file, and run it individually.

```bash
#bash
./db-fill
```

### Start Development server

After database ready you can start the development server by running this command.

```bash
php artisan serve
```