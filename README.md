🍜 Yume Ramen – Delivery App
📌 Project Description

Yume Ramen is a mobile-focused delivery web app made for a Japanese ramen restaurant.
The goal of this project is to create a visually attractive and easy-to-use delivery app where users can quickly browse the menu, select ramen dishes, and place an order for home delivery.

The app is inspired by Japanese culture and focuses on a smooth user experience, especially on mobile devices.

This project is made as a school assignment.

🎯 Project Goals

Create a user-friendly ramen delivery app

Apply Japanese visual style and atmosphere

Allow users to browse the menu without an account

Require users to log in or register before placing an order

Automatically fill in user details during checkout

Use a clean and well-structured database

👥 Target Audience

People who like Japanese ramen

Users who often order food online

Young and old users

Both new and existing ramen customers

🛠️ Technologies Used
Frontend

HTML

CSS

JavaScript

Backend

PHP

MySQL (phpMyAdmin)

Extra

Python (for data analysis and learning purposes)

🗄️ Database Structure

The database is designed around the user and the ordering process.

Main tables:

users – stores user and login data

addresses – stores delivery addresses

categories – ramen categories

menu_items – ramen dishes

orders – placed orders

order_items – items inside an order

Users must be logged in to place an order.
Orders are linked to users and addresses to allow automatic checkout filling.

📂 Project Folder Structure
yume-ramen/
├── public/
│ ├── index.php
│ ├── menu.php
│ ├── product.php
│ ├── cart.php
│ ├── checkout.php
│ ├── login.php
│ └── register.php
│
├── app/
│ ├── config/
│ ├── controllers/
│ ├── models/
│ └── helpers/
│
├── python/
│ └── analysis scripts
│
└── README.md

All frontend files are inside the public folder.
Backend logic and database connections are stored outside the public folder for better security and structure.

🔐 Authentication

Users can browse the menu without an account

Users must log in or register before placing an order

Passwords are securely stored using hashing

User data is reused during checkout to improve the user experience

🚫 Project Limitations

The following features are not included in this project:

Online payment systems (iDeal, PayPal, etc.)

Discount or coupon systems

Live delivery tracking

Reviews or chat systems

Multi-language support

These limitations follow the project requirements.

🐍 Python Usage

Python is used as an extra learning component.
It can be used for:

Order analysis

Exporting order data

Simple statistics and insights

Python is not part of the main ordering flow.

👨‍🎓 Author

This project is created by a 17-year-old Software Development student as part of a school assignment.
The main focus of this project is learning, structure, and clean code.

📄 License

This project is for educational purposes only.
