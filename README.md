# Laravel Project Installation Setup

Follow the steps below to set up the project locally.

---

## 1. Clone the Repository

```bash
git clone <repository-url>
cd <project-folder>
```

---

## 2. Install Dependencies

```bash
composer install
```

---

## 3. Create Environment File

```bash
cp .env.example .env
```

---

## 4. Generate Application Key

```bash
php artisan key:generate
```

---

## 5. Configure Database

Update the database credentials inside the `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

---

## 6. Run Migrations

```bash
php artisan migrate
```

---

## 7. Seed the Database

```bash
php artisan db:seed
```

Or run migration and seeding together:

```bash
php artisan migrate --seed
```

---

## 8. Start the Development Server

```bash
php artisan serve
```

Application URL:

```txt
http://127.0.0.1:8000
```

---

# Optional Commands

## Clear Cache

```bash
php artisan optimize:clear
```

## Create Storage Link

```bash
php artisan storage:link
```

```bash
Superadmin /superadmin/login
email: superadmin@urlshortner.com
pass: superadmin123
```

```bash
admin /admin/login
```

```bash
members /member/login
```
