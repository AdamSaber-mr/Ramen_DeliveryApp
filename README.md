🍜 Yume Ramen – Delivery Web App
Yume Ramen is een full-stack webapplicatie voor het bestellen van authentieke Japanse ramen.
De applicatie is mobile-first gebouwd, volledig responsive gemaakt voor tablet en desktop, en bevat een backend met database, authenticatie én een Python-analyse voor populaire gerechten.



🔗 Live demo (schoolserver):
👉 https://102896.stu.sd-lab.nl/schooljaar2/1_beroeps/Ramen_DeliveryApp/public/1_index.php



📸 Screenshots

(Hier kun je zelf screenshots toevoegen van: homepage, menu, productpagina, checkout, thankyou page)



🚀 Functionaliteiten:
👤 Gebruikers
Registreren & inloggen
Sessies voor ingelogde gebruikers
Alleen ingelogde gebruikers kunnen afrekenen



🍜 Menu & Producten
Overzicht van alle ramen uit de database
Categoriepagina’s (Shoyu, Miso, Tonkotsu, Spicy, Vegetarisch)
Product detailpagina met:
  beschrijving
  prijs / aanbiedingsprijs
  hoeveelheid selecteren



🛒 Winkelmand
Items toevoegen / verwijderen
Dynamische berekening van subtotaal en totaal
Winkelmand opgeslagen in PHP session



💳 Checkout & Bestellingen
Beveiligde checkout (login vereist)
Adres invoeren
Bestelling opslaan in database:
  orders
  order_items
  addresses
  Bedankt-pagina met echte bestelgegevens



🔥 Aanbiedingen
Gerechten met is_deal = 1
Oude prijs + nieuwe prijs zichtbaar
Werkt door in:
  menu
  categorie
  productpagina
  homepage



⭐ Populair Nu (Python)
Python script analyseert bestellingen
Berekent welke gerechten het meest besteld zijn
Resultaat wordt opgeslagen in populair.json
Homepage leest deze data dynamisch in



🧠 Python Analyse (AI/ML voorbereiding)
De app bevat een Python-gedeelte dat data analyseert uit de database:

export_orders.py
  Haalt data op uit order_items
  Exporteert menu_item_id + quantity naar JSON

analyse_orders.py
  Leest JSON data
  Telt hoeveel keer elk gerecht is besteld
  Sorteert resultaten
  Slaat top 3 populairste gerechten op in populair.json
➡️ Deze opzet is bewust zo gemaakt als basis voor latere AI / ML uitbreiding.



🧱 Gebruikte Technologieën
Front-end
HTML5
CSS3 (mobile-first, responsive)
JavaScript (interacties, cart)
UX-gericht design

Back-end
PHP 8
PDO (prepared statements)
PHP Sessions
Database
MySQL

Relaties:
  users
  menu_items
  categories
  orders
  order_items
  addresses

Python:
  mysql-connector-python
  JSON data analyse
  Data verwerking & sorting



📱 Responsive Design
Mobile-first ontwikkeld
Tablet layout aangepast (grid & scroll)

Desktop layout:
  gecentreerde content
  betere leesbaarheid
  verbeterde UX

Werkt goed op:
  telefoon
  tablet
  laptop / desktop



🗂️ Projectstructuur (globaal)
/public
  ├── 1_index.php
  ├── 2_menu.php
  ├── 3_category.php
  ├── 4_product.php
  ├── 5_checkout.php
  ├── 6_login.php
  ├── 7_register.php
  ├── 9_place_order.php
  ├── 10_thankyou.php
  ├── /includes
  ├── /assets
/app
  ├── /config
  ├── /models
  ├── /controllers
/python
  ├── export_orders.py
  ├── analyse_orders.py
  ├── data.json
  ├── populair.json



🎓 Wat ik heb geleerd
Full-stack werken (front-end ↔ back-end ↔ database)
PHP sessions en authenticatie
Database relaties & transacties
Data exporteren en analyseren met Python
JSON gebruiken als brug tussen Python en PHP
UX verbeteren voor meerdere schermformaten
Werken zoals in een echte productie-app



🔮 Mogelijke uitbreidingen
Betalingsmethode (iDEAL / Stripe)
Admin dashboard
AI aanbevelingen (ML model)
Ordergeschiedenis per gebruiker
Reviews / ratings

👨‍🍳 Auteur
Naam: Adam Saber
Opleiding: Software Development
Schooljaar: Jaar 2
Project: Beroepsproduct – Webapplicatie
