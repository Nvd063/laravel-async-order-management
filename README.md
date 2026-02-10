# Laravel Async Order Management System

A **real-world, production-style Laravel project** demonstrating modern backend practices such as **API authentication, asynchronous job processing, event-driven architecture, real email notifications, authorization policies, and performance optimizations**.

This project is built step-by-step with a clean and scalable structure, suitable for **learning, portfolio showcase, and interview preparation**.

## 🚀 Features

* 🔐 **Authentication (Laravel Sanctum)**
  Secure API-based authentication for users (SPA / API clients).

* 🌐 **API + Web Routes**
  Real-world structure separating API and web responsibilities.

* 🧾 **Order Management System**
  Users can place orders via API.

* ⚙️ **Queue & Jobs (Async Processing)**
  Heavy tasks (emails, logs) are processed in the background.

* 📣 **Events & Listeners**
  `OrderPlaced` event triggers listeners automatically.

* 📧 **Email Notifications**
  Real email is sent to the customer when an order is placed.

* 🛂 **Authorization (Policies)**
  Users can only access or modify their own orders.

* 🧮 **Database Transactions**
  Ensures data safety during order creation.

* ⚡ **Redis / Queue Drivers**
  Supports Redis or database-based queues.

* ✅ **Validation**
  Clean and secure request validation.

* 🚄 **Eager Loading**
  Optimized database queries for better performance.

* 🗑️ **Soft Deletes**
  Orders are safely deleted without losing data.

* 📦 **API Resources**
  Clean and consistent JSON API responses.

---

## 🛠️ Tech Stack

* **Laravel**
* **Laravel Sanctum**
* **MySQL**
* **Queues (Redis / Database)**
* **Events & Listeners**
* **Mail (SMTP)**

---

## 📂 Project Structure (Key Parts)

```
app/
 ├── Events/
 │    └── OrderPlaced.php
 ├── Listeners/
 │    └── SendOrderEmail.php
 ├── Jobs/
 ├── Policies/
 │    └── OrderPolicy.php
 ├── Models/
 │    └── Order.php
 └── Http/
      ├── Controllers/
      └── Resources/
```

---

## ⚙️ Installation & Setup

### 1️⃣ Clone Repository

```bash
git clone https://github.com/Nvd063/laravel-async-order-management.git
cd laravel-async-order-management
```

### 2️⃣ Install Dependencies

```bash
composer install
```

### 3️⃣ Environment Setup

```bash
cp .env.example .env
php artisan key:generate
```

Update `.env` with your database & mail credentials:

```env
DB_DATABASE=your_db
DB_USERNAME=root
DB_PASSWORD=

QUEUE_CONNECTION=database

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_email@gmail.com
MAIL_PASSWORD=your_app_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your_email@gmail.com
MAIL_FROM_NAME="Async Order System"
```

---

### 4️⃣ Run Migrations

```bash
php artisan migrate
```

### 5️⃣ Queue Setup

Create jobs table (if using database queue):

```bash
php artisan queue:table
php artisan migrate
```

Run queue worker:

```bash
php artisan queue:work
```

---

## 🔐 Authentication Flow (Sanctum)

* User registers / logs in
* Token is generated
* Token is required for protected API routes

---

## 🧪 API Example (Order Create)

**Endpoint:**

```
POST /api/orders
```

**Headers:**

```
Authorization: Bearer YOUR_TOKEN
Accept: application/json
```

**Response (Sample):**

```json
{
  "status": true,
  "message": "Order placed successfully",
  "data": {
    "id": 1,
    "total": 2500,
    "status": "pending"
  }
}
```

---

## 📧 Email Flow

1. Order placed
2. `OrderPlaced` event fired
3. Listener handles email sending
4. Email sent to the authenticated customer

---

## 🧠 Learning Outcomes

* How to build **async systems** in Laravel
* Event-driven architecture
* Queue & background processing
* Clean API design
* Real-world authorization & security

---

## 🧑‍💻 Author

**Developer:** Naveed Ahmed
**Purpose:** Learning + Portfolio + Interview Preparation

---

## ⭐ Contribution

Feel free to fork, improve, or suggest enhancements.

---

## 📜 License

This project is open-source and free to use for learning purposes.
<img width="1920" height="2103" alt="screencapture-mail-google-mail-u-0-2026-02-10-09_57_38" src="https://github.com/user-attachments/assets/9a657f5a-9a37-4027-a789-f4551afd08cc" />
