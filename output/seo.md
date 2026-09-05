# SEO — mbconsulting.com

> Nota: il file `AUDIT_YMMELY_LinkedIn_Sito.md` (punti S1–S8) non è stato fornito. Questo audit procede su best practice generali; verificare a mano che i punti dell'audit di agosto 2026 non si ripetano una volta recuperato il file.

## 1. Title e meta description

**IT**
- `<title>` (58): `MB Consulting | Agenzia comunicazione e sviluppo, Lodi e Lugano`
- meta description (154): `Agenzia di comunicazione e sviluppo digitale a Lodi e Lugano: AI per l'impresa, rebranding, siti ed e-commerce su misura, software, SEO, packaging e social.`

**EN** (pagina `/en/`)
- `<title>` (57): `MB Consulting | Creative & Dev Agency, Lodi and Lugano`
- meta description (151): `Communication and digital development agency in Lodi and Lugano: AI for business, rebranding, custom websites, e-commerce, software, SEO and packaging.`

Il title dell'anteprima (95 caratteri) va accorciato: Google tronca oltre ~60. Tenere il brand in testa, la keyword geo-servizio subito dopo.

## 2. Mappa dei heading

Una sola `<h1>`, presente nell'HTML iniziale.

- **H1** — `Creative liquid marketing.` (hero) → brand/payoff.
- **H2** `Undici aree, una regia` (#servizi) → *agenzia comunicazione Lodi Lugano* / servizi.
  - H2 dinamico scheda (`#scheda-t`): titolo area aperta → keyword per area. I tre H3 fissi `Cosa comprende` · `Come si lavora` · `Cosa ricevi` restano sotto ogni scheda.
- **H2** `Lavori recenti` (#lavori), con H3 per progetto (Barbara Rizzi Atelier, Pastificio Marcello, MIOBUK…) → *case study, portfolio agenzia*.
- **H2** `Competenze` (#competenze), H3: `Direzione strategica e creativa`, `Sviluppo web e software` (*sviluppo siti/e-commerce/software su misura*), `Design e produzione` (*packaging*).
- **H2** `Un'agenzia con trent'anni di mestiere dietro` (#agenzia), H3 timeline (1995 Comune di Lodi, Invidia 1999–2019…) → *E-A-T, storia, dal 1995*.
- **H2** `Come lavora MB Consulting` (#metodo) → *metodo agenzia*.
- **H2** `Parliamo del tuo progetto.` (#contatto) → intento conversione.

Keyword→heading: *agenzia comunicazione Lodi/Lugano*→H2 #servizi; *sviluppo siti/e-commerce/software su misura*→H3 Sviluppo + schede aree 06/07/08; *agenzia SEO*→scheda area 09; *packaging (food, alta profumeria, automotive)*→scheda area 05 + H3 Design. Le keyword geo vanno rafforzate nel testo di #servizi e #contatto (l'H1 è solo payoff, quindi il carico geo/servizio sta negli H2 e nel title/description).

## 3. JSON-LD (pronto da incollare in `inc/seo.php`, nel `<head>`)

```html
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Person",
      "@id": "https://mbconsulting.com/#mattia",
      "name": "Mattia Borri",
      "jobTitle": "Direttore creativo e consulente digitale",
      "worksFor": { "@id": "https://mbconsulting.com/#org" },
      "url": "https://mbconsulting.com/",
      "sameAs": [
        "https://www.linkedin.com/in/mattiaborri",
        "https://www.ymmely.com"
      ]
    },
    {
      "@type": "ProfessionalService",
      "@id": "https://mbconsulting.com/#org",
      "name": "MB Consulting di Mattia Borri",
      "slogan": "creative liquid marketing",
      "url": "https://mbconsulting.com/",
      "founder": { "@id": "https://mbconsulting.com/#mattia" },
      "brand": { "@type": "Brand", "name": "YMMELY", "url": "https://www.ymmely.com" },
      "vatID": "IT10181950964",
      "telephone": "+39 375 605 2722",
      "email": "info@mbconsulting.com",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Corso Vittorio Emanuele II 56",
        "postalCode": "26900",
        "addressLocality": "Lodi",
        "addressRegion": "LO",
        "addressCountry": "IT"
      },
      "areaServed": [
        { "@type": "City", "name": "Lodi" },
        { "@type": "City", "name": "Lugano" },
        { "@type": "City", "name": "Milano" }
      ],
      "sameAs": ["https://www.linkedin.com/company/mbconsulting"],
      "hasOfferCatalog": {
        "@type": "OfferCatalog",
        "name": "Aree di intervento",
        "itemListElement": [
          { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Intelligenza artificiale per l'impresa (WhatsApp Business, CRM)" }},
          { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Posizionamento e rebranding" }},
          { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Startup: dal nome al lancio" }},
          { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Identità di marca e registrazione (UIBM/EUIPO)" }},
          { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Packaging: food, alta profumeria, automotive" }},
          { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Siti web dinamici" }},
          { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "E-commerce customizzati" }},
          { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Software su misura" }},
          { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "SEO e visibilità" }},
          { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Video e fotografia" }},
          { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Social media" }}
        ]
      }
    }
  ]
}
</script>
```
Confermare l'URL LinkedIn personale di Mattia (placeholder `/in/mattiaborri`). NAP identico al Google Business Profile.

## 4. Link strategy ymmely.com ↔ mbconsulting.com (anti-cannibalizzazione)

- **Divisione dei temi**: mbconsulting.com = agenzia, servizi, sviluppo, "Mattia Borri direttore creativo". ymmely.com = solo brand YMMELY. Non duplicare pagine servizi né la bio di Mattia sui due domini.
- **Da ymmely.com → mbconsulting.com**: link "Mattia Borri → mbconsulting.com" nel menu e nel footer + **301** da `ymmely.com/mattia-borri/` a `https://mbconsulting.com/` (consolida l'autorità della vecchia pagina bio). Non toccare `/claudiamattia` (ID 9098).
- **Da mbconsulting.com → ymmely.com**: una sola riga in sezione Agenzia (già presente), link normale (non nofollow).
- **Canonical**: ogni pagina auto-canonica; `https://mbconsulting.com/` e `/en/` con canonical propri + `hreflang` reciproci (`it`, `en`, `x-default`→IT). Nessun canonical cross-dominio tra i due siti.
- **sitemap.xml**: generata (IT + EN con annotazioni hreflang), inviata a Search Console per entrambe le proprietà; referenziata in robots.txt.
- **robots.txt**: aperto —
  ```
  User-agent: *
  Allow: /
  Sitemap: https://mbconsulting.com/sitemap.xml
  ```

## 5. Crawlability: rischio opacity:0 / reveal / mappa JS

L'anteprima usa `.rv{opacity:0}` + reveal via IntersectionObserver, e la mappa SVG e la fisarmonica sono **generate da JS** dall'array `AREE`. Rischio: se il testo esiste solo nel JS o dipende dal JS per esistere nel DOM, Googlebot può non renderizzarlo e il testo delle 11 aree sparisce dall'indice.

Regola: **tutto il testo deve stare nell'HTML iniziale server-side.**
- Il reveal è solo estetico: il testo è già nel markup, `opacity:0` non lo nasconde a Google (indicizza comunque). OK, ma niente `display:none` permanente.
- Le 11 aree: renderizzare titoli, descrizioni e i tre livelli (Cosa comprende/Come si lavora/Cosa ricevi) in HTML da PHP (loop su `content/aree.json` / CPT), poi arricchire con JS. La mappa SVG e la fisarmonica leggono lo stesso markup, non lo creano.
- Le 12 card Lavori: già in HTML (confermato).
- Verifica obbligatoria dopo il deploy: `curl -s https://mbconsulting.com | grep -c "1995"` deve dare **≥ 1** (nell'anteprima dà 2). Aggiungere `grep -c "Intelligenza artificiale"` e `grep -c "E-commerce"` ≥ 1.
- Fallback `<noscript>` per la sezione aree se il render resta JS-dipendente.

## 6. Top 8 controlli pre-pubblicazione

1. `curl -s https://mbconsulting.com | grep -c "1995"` ≥ 1 (+ hero, aree, lavori nel sorgente).
2. Un solo `<h1>`; gerarchia H2/H3 corretta e senza salti.
3. Title ≤60 e description ≤155 su IT e EN; `hreflang` it/en/x-default reciproci e validi.
4. JSON-LD valido (Rich Results Test / Schema.org validator), NAP = Google Business Profile.
5. Canonical corretti; 301 `ymmely.com/mattia-borri/`→mbconsulting.com attivo (`curl -I`).
6. robots.txt aperto + sitemap.xml raggiungibile e inviata a Search Console.
7. Lighthouse mobile ≥ 90 ×4; hero WebP/AVIF con `fetchpriority="high"` e `<picture>` mobile.
8. `alt` su logo e loghi clienti; nessun link rotto; solo lavori con flag `pubblicabile` visibili.
