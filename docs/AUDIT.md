# Audit — ymmely.com (sito attuale)

> Audit tecnico eseguito **con accesso amministratore reale** al sito (via WordPress/WPVibe).

## 1. Identità del brand
- **YMMELY — Digital Reactive Communication**, agenzia di comunicazione digitale.
- **Sede: Lugano** (unico riferimento fisico da usare — nessun altro indirizzo).
- Due persone in evidenza: **Mattia Borri** (Creative Director) ed **Erika Varriale**.
- Clienti citati: **Aston Martin, BMW, Salvatore Ferragamo, Studio Rocco**; case anche a Lugano (Scuola Tennis Margaroli).

## 2. Stack tecnico (rilevato)
- **WordPress 7.0.3**, **PHP 7.4.33** (datato — da aggiornare).
- Tema attivo: **Munio**; costruzione pagine con **Elementor**.
- Plugin chiave: Weglot (traduzioni), FooGallery, WPForms, Brevo/Sendinblue + SendPress (email),
  Click-to-Chat WhatsApp, Autoptimize/Hummingbird/WP-Optimize/Smush (performance/cache), Jetpack, Akismet.
- Analytics: **Google Tag Manager (GTM-WWPGKBM)** + Google Analytics (UA-149735886-5, Universal Analytics — obsoleto, migrare a GA4).
- Font: Google Fonts (caricati da CDN esterna).

## 3. Inventario contenuti (pagine pubblicate principali)
- `/` Home (template showcase-page.php) · `/about-us/` · `/mattia-borri/` · `/erika-varriale/`
- `/references/` · `/news/` (Fresh News) · `/contatti/` · `/privacy/`
- Case study (post): Studio Rocco Milano, Scuola Tennis Margaroli Lugano, Attuatori Nautilus,
  Coworking11 Lodi, Orma Business Consulting, Zen Fashion Group, La Pergola Lodi, Art Director/Graphic Designer.
- Molte bozze storiche di servizi ("prova"): Web Design, SEO, Advertising, Customer Care, Cloud/Hosting, ecc.
- Pagine "brief" già sperimentate con AI: `/claudiamattia/`, `barbararizzibrief4maggio` (+ plugin `vibe-ai`).

## 4. Note critiche
- **UA (Universal Analytics) dismesso**: migrare a GA4.
- **PHP 7.4 a fine vita**: aggiornare per sicurezza/performance.
- Font da CDN esterna: in ottica performance/privacy conviene self-host (WOFF2).
- Molte bozze/pagine di test da ripulire nella migrazione.
- Il claim "Reactive" è forte ma **non messo in scena**: è la principale opportunità del redesign.

## 5. Migrazione (quando si sostituisce il sito)
- Costruzione su **ymmely.com/new** (fatto: pagina live pubblicata).
- Redirect 301 dalle URL attuali alle nuove (About→Studio, area→DRC, News→Journal, case→Work).
- Preservare tracking (nuovo GA4) e traduzioni (valutare Weglot vs. soluzione statica).
