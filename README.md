# 🏆 Activity Management System

This project is a **# 🏆  System System** built using Laravel that tracks user activities and awards points for daily physical activities (like running, walking, etc.). Users are ranked based on their accumulated points, and the leaderboard can be filtered by day, month, and year.

---

## 🚀 **Features**

✅ View leaderboard with total points and ranks.  
✅ Add new users dynamically.  
✅ Add new activities (e.g., running, walking, etc.) with +20 points each.  
✅ Recalculate leaderboard ranks automatically after adding activities or users.  
✅ Filter leaderboard by:
- Day (Today’s activities)
- Month (Current month’s activities)
- Year (Current year’s activities)  

✅ Search leaderboard by User ID.  

---

## ⚙️ **System Requirements**

- PHP 8.1 or higher
- Composer
- MySQL or any supported database
- Laravel 10 or higher
- Node.js & npm (optional for frontend assets)

---

## 🛠️ **Installation Guide**

Follow these steps to set up the project locally:

### 1. 📥 Clone the Repository
```bash
git clone https://github.com/azimkhanbaloch/activity-management.git
cd activity-management
```

### 2.📦 Install dependencies
```bash
composer install
```

### 3. ⚙️ Copy & Update ENV File
```bash
cp .env.example .env
```

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=activity_management
DB_USERNAME=root
DB_PASSWORD=
```

### 4. 🔑 Generate Application Key
```bash
php artisan key:generate
```

### 5. 📚 Run Migrations & Seeders
```bash
php artisan migrate --seed
```

### 6. 🌐 Serve Application
```bash
php artisan serve

http://127.0.0.1:8000/
```
