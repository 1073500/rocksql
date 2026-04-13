# 🪨 RockSQL

Een Laravel-webapplicatie waarmee gebruikers hun gevonden rocks kunnen delen, ontdekken en beheren.
Gebouwd als schoolproject met Laravel Breeze voor authenticatie en Blade als templating engine.

---

## 📋 Inhoudsopgave

- [Over het project](#over-het-project)
- [Functionaliteiten](#functionaliteiten)
- [Technische stack](#technische-stack)
- [Installatie](#installatie)
- [Gebruik](#gebruik)
- [Rollen & rechten](#rollen--rechten)
- [Beveiliging](#beveiliging)
- [Changelog](#changelog)

---

## Over het project

RockSQL is een webapplicatie waarbij gebruikers hun eigen rocks kunnen toevoegen, 
bekijken, bewerken en verwijderen. Gebruikers kunnen rocks filteren op continent en categorie, 
zoeken op naam en op andere gebruikers reageren via comments. Admins hebben uitgebreide beheermogelijkheden via een eigen dashboard.

---

## Functionaliteiten

### Rocks
- Rocks toevoegen, bekijken, bewerken en verwijderen (CRUD)
- Afbeelding uploaden bij een rock
- Filteren op continent en meerdere categorieën tegelijk
- Zoeken op naam én meerdere andere kolommen
- Paginatie

### Gebruikers
- Registreren en inloggen via Laravel Breeze
- Profielpagina met profielfoto upload
- Gebruikersstatus: actief of inactief
- Gebruikers kunnen alleen hun eigen rocks bewerken/verwijderen

### Comments
- Comments plaatsen onder rocks
- Toegang tot comments vereist een minimum aantal geplaatste rocks (Broken Access Control bescherming)

### Admin
- Admin dashboard met overzicht van alle gebruikers
- Admin kan alle rocks bewerken en verwijderen
- Admin kan gebruikers bewerken en verwijderen

---

## Technische stack

| Onderdeel | Technologie |
|---|---|
| Framework | Laravel |
| Authenticatie | Laravel Breeze |
| Templating | Blade |
| Database | MySQL |
| Beveiliging | SQL Injection-bescherming, Broken Access Control |

---

## Installatie

### Vereisten

- PHP >= 8.1
- Composer
- Node.js & npm
- MySQL

### Stappen

1. **Repository klonen**
   ```bash
   git clone https://github.com/1073500/rocksql.git
   cd rocksql
   ```

2. **Dependencies installeren**
   ```bash
   composer install
   npm install && npm run build
   ```

3. **Omgevingsvariabelen instellen**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```


4**Migrations en seeders uitvoeren**
   ```bash
   php artisan migrate:fresh --seed
   ```

5**Applicatie starten**
   ```bash
   php artisan serve
   ```


---

## Gebruik

### Standaard accounts (via seeder)

| Rol | E-mail | Wachtwoord |
|---|---|---|
| Admin | rockyiii@hr.nl | password |
| Gebruiker | rockyiv@hr.nl | password |

> Pas de seeder aan als je andere standaardgegevens wilt gebruiken.

---

## Rollen & rechten

| Actie | Gast | Gebruiker | Admin |
|---|:---:|:---:|:---:|
| Rocks bekijken | ✅ | ✅ | ✅ |
| Rock toevoegen | ❌ | ✅ | ✅ |
| Eigen rock bewerken/verwijderen | ❌ | ✅ | ✅ |
| Alle rocks bewerken/verwijderen | ❌ | ❌ | ✅ |
| Comments plaatsen* | ❌ | ✅* | ✅ |
| Admin dashboard | ❌ | ❌ | ✅ |
| Gebruikers beheren | ❌ | ❌ | ✅ |

*\* Gebruikers moeten minimaal een bepaald aantal rocks geplaatst hebben voordat zij comments kunnen plaatsen.*

---

## Beveiliging

### SQL Injection
Alle zoekopdrachten maken gebruik van Laravel's query builder met parameterbinding, zodat SQL Injection aanvallen worden voorkomen.

### Broken Access Control
Gebruikers kunnen pas comments plaatsen nadat ze een minimum aantal rocks hebben toegevoegd. Dit voorkomt misbruik van nieuwe of inactieve accounts.

### Autorisatie
- Gebruikers kunnen uitsluitend hun eigen rocks bewerken en verwijderen.
- Beheerfuncties zijn alleen toegankelijk voor gebruikers met de `isAdmin`-rol.

---

## Licentie

Dit project is gemaakt als schoolopdracht en heeft geen commerciële licentie.
