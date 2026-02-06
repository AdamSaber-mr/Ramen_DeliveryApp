
# 🍜 Yume Ramen – Full-Stack Food Delivery Web Application

---

## 📌 Project Overview

**Yume Ramen** is a full-stack food delivery web application that allows users to browse, order, and checkout authentic Japanese ramen dishes.  
The project is designed and built as a realistic, production-style application with a strong focus on **usability, scalability, and clean architecture**.

The application is developed using a **mobile-first approach**, fully responsive for tablet and desktop, and simulates a real-world food delivery platform.

Although created as a school project, Yume Ramen is built at **portfolio and industry-oriented level**.

🌐 *Live website:*  
https://102896.stu.sd-lab.nl/schooljaar2/1_beroeps/Ramen_DeliveryApp/public/1_index.php

---

## 🚀 Key Features

- User registration and authentication  
- Dynamic menu fully loaded from the database  
- Category-based browsing (Shoyu, Miso, Tonkotsu, Spicy, Vegetarian)  
- Product detail pages with pricing and descriptions  
- Support for discounted products (regular & sale prices)  
- Shopping cart using PHP sessions  
- Checkout process with automatic price calculation  
- Order storage with a relational MySQL database  
- Data analysis using Python (popular products)  
- Fully responsive UI (mobile, tablet, desktop)  

---

## 🧠 Data Analysis & Python Integration

One of the most distinctive aspects of this project is the integration of **Python-based data analysis**.

### 🔄 Workflow

1. Order data is exported from the MySQL database into JSON format  
2. A Python script processes the data:
   - Counts how often each product is ordered  
   - Sorts products by popularity  
   - Selects the top 3 most ordered dishes  
3. The results are stored in a JSON file  
4. The PHP frontend reads this file  
5. The top 3 popular dishes are displayed dynamically on the homepage  

This setup is intentionally designed as a foundation for **future AI or machine learning features**.

---

## 🧱 Technology Stack

### 🎨 Frontend
- HTML5  
- CSS3 (mobile-first & responsive design)  
- JavaScript  

### ⚙️ Backend
- PHP  
- PHP Sessions (shopping cart)  
- Server-side validation  

### 🗄️ Database
- MySQL  
- Relational structure including:
  - Users  
  - Addresses  
  - Orders  
  - Order items  
  - Products & categories  

### 📊 Data Processing
- Python  
- JSON export and analysis  

---

## 🎯 UX & Design Approach

- 📱 Mobile-first design strategy  
- 📐 Optimized layouts for tablet and desktop  
- 🎨 Calm, Japanese-inspired color palette  
- 🧭 Clear navigation and visual hierarchy  
- 👉 Strong call-to-actions  

The user interface is inspired by **Japanese aesthetics** and modern food delivery applications.

---

## 📂 Project Structure (Overview)

```text
/assets
/css
/js
/php
/database
/python
/data
```
---

🎓 Learning Outcomes
- Through this project, I gained hands-on experience with:
- Building a complete full-stack web application
- Designing relational databases
- Backend development with PHP
- Frontend development with a UX-focused approach
- Session-based state management
- Data analysis using Python
- Integrating multiple technologies into one application

Yume Ramen demonstrates how frontend, backend, database design, and data processing work together in a scalable web application.

---

👨‍💻 Author

Adam
Software Development Student
Grafisch Lyceum Rotterdam
Age: 17

---

