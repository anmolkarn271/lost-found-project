# 🔍 Lost & Found Web Application

## 📌 Overview

This is a web-based Lost & Found system that allows users to report lost and found items. The system includes authentication, item reporting, and viewing features.

---

## 🚀 Features

* User Signup & Login
* Session Management
* Report Lost Items
* Report Found Items
* View All Items
* Clean UI with background media

---

## 🛠️ Technologies Used

* PHP
* MySQL
* HTML, CSS, JavaScript
* XAMPP Server

---

## 📁 Project Structure

```
lost_found/
│── index.php
│── login.php
│── signup.php
│── dashboard.php
│── report_lost.php
│── report_found.php
│── items.php
│── logout.php
│── config.php
│
├── media/
│   ├── logo.png
│   ├── background.jpg
│   ├── bg.mp4
```

---

## ⚙️ Setup Instructions

### 1️⃣ Install XAMPP

Start Apache & MySQL

### 2️⃣ Move Project

Place folder in:

```
C:\xampp\htdocs\
```

### 3️⃣ Create Database Manually

Create a database in phpMyAdmin (example: `lost_found_db`)

Then create required tables manually based on project needs.

---

## 🔌 Database Connection

Database connection is already configured in `config.php`:

```php
$conn = mysqli_connect("localhost", "root", "", "lost_found_db");
```

Update DB name if needed.

---

## ▶️ Run Project

Open:

```
http://localhost/lost_found/
```

---

## ⚠️ Notes

* Database file is not included
* Media files are stored in `media/` folder
* Ensure correct file paths in code

---

## 🌟 Future Improvements

* Add database export file
* Improve UI/UX
* Add search & filters
* Deploy online

---

## 👨‍💻 Author

Anmol Rajput
B.Tech CSE (RGPV)
