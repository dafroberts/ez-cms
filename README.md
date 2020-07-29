<div style="text-align:center">
    <img  src="https://repository-images.githubusercontent.com/283291020/a2eb7300-d136-11ea-9ea5-d8c25588677f" />
</div>

# Introduction
Ez's goal is to provide a hassle free interface between developers and content creators by doing the heavy lifting between your code and the editor's content. It takes care of the tedious tasks involved in CRUD tasks without removing or modifying any of Laravel's great features.

### Real time editing
- TODO

### Automatic content management
- TODO

### More to come!

# Installation
Clone the repository
```
git clone https://github.com/Dave91/ez-cms.git
```

Install dependencies
```
composer install
```

Configure database connection in **.env**
```bash
DB_CONNECTION="mysql"
DB_HOST="localhost"
DB_PORT=3306
DB_DATABASE="Database name"
DB_USERNAME="User name"
DB_PASSWORD="***"
```

Run database migrations (include `--seed` flag to populate the database with test data)
```
php artisan migrate
```

# Collections
Collections are standard Eloquent models with a few extra features; they are stored in their own namespace (`App\Collections`) and are automatically indexed and editable through the control panel. They extend Laravel's vanilla Model class meaning there's no new rigid rules to learn. If it can be done to an Eloquent model, it can be done to a collection.

## Creating a collection

This command supports the same options as Artisan's `make:model` command. Use the `-h` or `--help` flag for more information. 
```bash
php artisan make:collection name
```
