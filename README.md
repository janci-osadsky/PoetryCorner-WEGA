# PoetryCorner-WEGA
Project for Web Graphics (WEGA) and Setup Guide for the Website using phpMyAdmin and XAMPP

## **Slovak Version**

### **Úvod**
Tento dokument obsahuje podrobný návod, ako nastaviť a spustiť webovú aplikáciu pomocou XAMPP (Apache a MySQL) a phpMyAdmin. Budete môcť spravovať básne a ich kategórie, zobrazovať ich, a ak ste administrátor, aj ich upravovať.

---

### **Predpoklady**
- Stiahnite si a nainštalujte XAMPP z oficiálnej stránky: [https://www.apachefriends.org/](https://www.apachefriends.org/).
- Overte, že máte funkčný prehliadač (napr. Google Chrome alebo Firefox).

---

### **Postup nastavenia**

#### **1. Spustenie XAMPP**
1. Otvorte aplikáciu XAMPP.
2. Spustite Apache a MySQL kliknutím na tlačidlá **Start**.

#### **2. Vytvorenie databázy**
1. Otvorte phpMyAdmin vo vašom prehliadači na adrese: [http://localhost/phpmyadmin/](http://localhost/phpmyadmin/).
2. Kliknite na **New** na ľavej strane na vytvorenie novej databázy.
3. Pomenujte databázu ako `poems` a kliknite na **Create**.
4. Spustite nasledujúce SQL príkazy:
   ```sql
   CREATE TABLE poems (
       ID INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(255) NOT NULL,
       text TEXT NOT NULL,
       author VARCHAR(255) NOT NULL,
       date DATE NOT NULL,
       lang VARCHAR(10) NOT NULL
   );

   CREATE TABLE category (
       name VARCHAR(255) PRIMARY KEY
   );
5. Pridajte ďalšie tabuľky podľa potreby (napr. pre kategórie alebo prepojenia medzi básňami a kategóriami).
#### **3. Umiestnenie súborov**
1. Skopírujte všetky súbory vášho projektu do adresára `htdocs` vo vašej inštalácii XAMPP. (Typicky sa nachádza v `C:\\xampp\\htdocs\\`).
2. Uistite sa, že adresárová štruktúra obsahuje všetky súbory ako `welcome.php`, `categories.php`, `fullpoem.php`, `functions.php` a ďalšie.
#### **4. Nastavenie pripojenia k databáze**
1. Otvorte súbor `includes/config/config.php` vo vašom textovom editore.
2. Upravte nasledovné údaje:
   ```php
   $host = 'localhost';
   $user = 'root';
   $password = '';
   $database = 'poems';
3. Uložte zmeny.
#### **5. Spustenie webovej stránky**
1. Otvorte prehliadač a zadajte adresu: [http://localhost/welcome.php](http://localhost/welcome.php).
2. Mali by ste vidieť úvodnú stránku. Odtiaľto môžete navigovať na rôzne sekcie. AK nie, skontrolujte si, či je umiestnenie súborov priamo v htdocs.

---

### **Pridávanie básní**
- v phpMyAdmin dajte do databázy _do tabuľky poems_ import súboru [poems.sql](poems.sql).
- pri registrácií účtu sú všetky práva nastavené na užívateľa, administrátora treba manuálne nastaviť

---
---

### **Administrátorské funkcie**
- Ak ste prihlásený ako administrátor (úroveň = 1), budete môcť:
  - Upravovať existujúce básne.
  - Pridávať básne do nových kategórií.

---

### **Riešenie problémov**
- **Webová stránka sa nenačíta**: Overte, že Apache a MySQL sú spustené.
- **Chybové správy**: Skontrolujte konzolu XAMPP a prehliadač pre chybové hlásenia.
- **Databázové problémy**: Overte správnosť pripojenia v súbore `config.php`.

---

### **Záver**
Po správnom nastavení by mala byť vaša aplikácia funkčná. Ak narazíte na problémy, kontaktujte podporu alebo sa vráťte k tomuto návodu.

