# rz-blog

## Instructions

Follow these steps to set up the production environment.

Install dependencies:

```bash
composer install
```

### Configure `.env` file

First, copy `.env.example` and rename it to `.env`:

```bash
cp .env.example .env
```

Set the application environment to `production`:

```bash
APP_ENV=production
```

Turn off debug mode:

```bash
APP_DEBUG=false
```

Set up the database connection:

```bash
DB_CONNECTION=mysql
DB_HOST=your_host_name
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

Generate an application key:

```bash
php artisan key:generate
```

### Database Migration

Run migrations and seed the database:

```bash
php artisan migrate --seed
```

### Create a new user with Tinker

Start Tinker using the `php artisan tinker` command. Before running the following script, ensure you modify the values as needed:

```bash
$userName   = 'Ryosuke';
$email      = 'rz-blog@example.com';
$password   = Illuminate\Support\Facades\Hash::make('secret');

App\Models\User::create([
    'name'      => $userName,
    'email'     => $email,
    'password'  => $password,
]);
```

### Setting up Sass

Build the assets:

```bash
npm run build
```
