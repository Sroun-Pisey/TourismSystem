# Tourism System Project

This repository contains the **Tourism System** application, which is a full-stack project including:

- **Laravel Backend** (API)
- **Angular Frontend** (Web)
- **Ionic Mobile App** (Android/iOS)

---

## **Project Structure**

TourismSystem/
├── backend/ # Laravel API
├── frontend/ # Angular Web App
└── mobile/ # Ionic Mobile App


---

## **1️⃣ Laravel Backend**

**Folder:** `backend`

### Features
- RESTful API for managing customers, categories, and posts
- Authentication (login/register)
- Customer profile, posts, and categories management
- JSON API responses for frontend and mobile consumption

### Installation
```bash
cd backend
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```
Note: Configure database in .env

API Endpoints (examples)

| Method | Endpoint       | Description           |
| ------ | -------------- | --------------------- |
| GET    | /api/customers | Get all customers     |
| POST   | /api/customers | Create a new customer |
| GET    | /api/posts     | Get all posts         |
| POST   | /api/posts     | Create a new post     |

2️⃣ Angular Frontend

Folder: Tourismfrontend

Features

Web application for Tourism System

Connects with Laravel API

Displays posts, categories, and customer info

Authentication and dashboard
cd frontend
npm install
ng serve
Access: http://localhost:4200

3️⃣ Ionic Mobile App

Folder: mobile

Features

Mobile application (Android/iOS)

Connects with Laravel API

Customers can browse posts and categories

Login/Register and profile management

Installation
cd mobile
npm install
ionic serve
# or run on Android/iOS device
ionic capacitor add android
ionic capacitor add ios
ionic capacitor run android

Technologies Used

Backend: Laravel 10, PHP 8, MySQL

Frontend: Angular 16

Mobile: Ionic 7, Angular

Version control: Git, GitHub

Links

Laravel Backend: GitHub

Angular Frontend: GitHub

Ionic Mobile App: GitHub

Installation
# TourismSystem
>>>>>>> 54f85a270face98eb5234ff23d101e78ce7c33d2
