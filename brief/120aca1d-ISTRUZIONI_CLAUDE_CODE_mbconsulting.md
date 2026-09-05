# ISTRUZIONI OPERATIVE — mbconsulting.com
Da mettere nella root del progetto come `CLAUDE.md` (Claude Code lo legge automaticamente). Il file `PROMPT_CLAUDE_CODE_mbconsulting.md` è il brief; questo è il manuale di lavoro.

## 1. Struttura del repository

```
mbconsulting/
├── CLAUDE.md                      ← questo file
├── brief/
│   ├── PROMPT_CLAUDE_CODE_mbconsulting.md
│   ├── mbconsulting-onepage-preview.html   ← fonte di verità per HTML/CSS/JS/copy
│   ├── AUDIT_YMMELY_LinkedIn_Sito.md
│   ├── References_Master_MattiaBorri.md
│   └── MBCONSULTING_YMMELY_Standard_Grafico.md
├── content/
│   ├── aree.json                  ← 11 aree (n, titolo breve, titolo, descrizione, voci, approfondimento, cosa ricevi, cta) (n, titolo breve, titolo, descrizione, voci, cta) → mappa + schede
│   ├── lavori.json                ← 12 card (cliente, settore, anno, sintesi, stack, pubblicabile)
│   ├── competenze.json            ← 3 colonne
│   ├── storia.json                ← timeline
│   └── contatti.json              ← canali, ragione sociale, P.IVA
├── assets/
│   ├── logo/                      ← logowhite300-mbconsulting.png + vettoriale quando arriva
│   ├── hero/                      ← foto full-screen (desktop ≥2400px, mobile verticale)
│   ├── clienti/                   ← loghi clienti esportati da ymmely.com (vedi §4)
│   └── fonts/                     ← serif self-hosted (Source Serif 4 o Libre Caslon), woff2
├── theme/mbconsulting-theme/      ← tema WordPress
├── output/                        ← consegne degli agenti + DONE.md
└── .claude/agents/                ← ux-mobile, motion-dev, wp-builder, seo-auditor, copy-editor, linkedin-manager, social-aligner, qa-reviewer
```

## 2. Regole fisse (non negoziabili)

- Voce dell'agenzia: MB Consulting in terza persona; Mattia Borri = fondatore e direttore creativo. Niente "io", niente "noi" ripetuti.
- Nessun nome di cliente nei nove capitoli servizi. I clienti stanno solo in `lavori.json` e nella riga "brand".
- YMMELY: una riga con link a ymmely.com nella sezione Agenzia. Nient'altro. ymmely.com non si tocca.
- Nessun form, nessun header a barra, nessun footer classico. Contatto = link diretti. Colophon legale in una riga (ragione sociale, sede, P.IVA, Privacy, Cookie, EN).
- Palette bianco/blu mare come da anteprima. Niente nero/oro. Etichette e pulsanti in boreal 200 maiuscolo .155em (kit Adobe Fonts di MB Consulting, non quello di MIOBUK). Nessuna pill, nessun bordo arrotondato, nessun contenitore attorno a logo e menu.
- Nessuna età, nessun conteggio fisso di anni nel presente. In hero niente riga "MB Consulting · Lodi · Lugano" e niente frase "Fondata e diretta da Mattia Borri, sul web dal 1995": la storia sta nella sezione Agenzia.
- Ogni lavoro ha il flag `pubblicabile`: false finché non c'è l'ok scritto del cliente. QA blocca il deploy se un lavoro non pubblicabile è visibile.

## 3. Inventario contenuti (già scritti nell'anteprima, da estrarre in JSON)

**Aree (ordine fisso, mappa con regia al centro):** 01 AI per l'impresa (con WhatsApp e CRM) · 02 Posizionamento e rebranding · 03 Startup dal nome al lancio · 04 Identità di marca e registrazione · 05 Packaging · 06 Siti web dinamici · 07 E-commerce customizzati · 08 Software su misura · 09 SEO e visibilità · 10 Video e fotografia · 11 Social media.

**Lavori (12):** Barbara Rizzi Atelier · Pastificio Marcello · MIOBUK · MCL Ring / MyCircleLife · LAB-X Professional · GSC Logistics · SIPOM Atelier/RYKEM · Ferraiuolo Foods · AREAG.net · Italia in Campus · Farmacie e servizi del lodigiano · Formaggi Betti.

**Brand (riga sotto i lavori):** Aston Martin · Roberto Cavalli · Salvatore Ferragamo · Stella Bianca · Caseificio Uberti · Ferraiuolo Foods · Ecover · Padel Club Tolcinasco · Tennis Padel Luino · Nautilus · Belcor · Studio Rocco · Agrisafe · Alitrans · Carrisi · Valentina Cortese · Francesca Piccini · Strawberry · Brako Ceramiche · Le Cult 1944 · ML Ferrari · Pastificio Maddalena · Rent-House Immobiliare · Sol-In.

**Competenze (extra da non dimenticare):** gestione avanzata WhatsApp Business (cataloghi, risposte automatiche, flussi) · CRM e robotizzazione delle risposte automatiche · WhatsApp Business API.

**Storia:** 1995 Comune di Lodi · anni novanta COMEuro + Politecnico · 1999–2019 Invidia Pubblicità · Ecover S.r.l. direttore marketing (date da chiedere) · oggi Marketing Manager Pastificio Marcello (Milano, dal 1939) con software gestione ordini sviluppato da MB Consulting · oggi MB Consulting.

## 4. Procedura: esportare i loghi clienti da ymmely.com

Mattia può dare accesso a ymmely.com in uno di questi due modi. Scegli il primo disponibile.

**A) Plugin WPVibe (preferito, stesso metodo di barbararizzi.com)**
1. Mattia installa e attiva su ymmely.com il plugin WPVibe (Vibe AI) e lo collega al suo account.
2. Da Claude: `WordPress MCP:rest_api` con `site_url=https://ymmely.com`, `GET /wp/v2/media?per_page=100&media_type=image&search=logo` e poi senza filtro `search`, paginando con `page=2,3…` finché la risposta è vuota.
3. Salva ogni `source_url` con `title` e `alt_text` in `assets/clienti/inventario.csv`.
4. Scarica i file (`curl -L`), converti in PNG trasparente o SVG se disponibile, normalizza a 320px di larghezza max, nome file `cliente-slug.png`.
5. Cerca anche i loghi dentro le pagine Elementor: `POST /wpvibe/v1/content/search` su `_elementor_data` con pattern `logo` e `clienti`.

**B) Application Password WordPress**
1. Mattia crea in WordPress → Utenti → Profilo → "Password applicazione" una password per "Claude Code" e la passa in chat (non nel repo).
2. Da terminale: `curl -u "utente:password-app" "https://ymmely.com/wp-json/wp/v2/media?per_page=100&page=N"` e stesso flusso dei punti 3–5.
3. Se il sito blocca i bot (è il caso di ymmely.com per l'HTML pubblico), la REST autenticata funziona comunque: verificare con un `GET /wp/v2/users/me`.

**Uso dei loghi nel sito:** parete loghi in una riga scorrevole nella sezione Lavori, monocromatici (filtro CSS `grayscale(1) opacity(.7)`, colore al passaggio), lazy-load, `alt` con il nome del brand. Solo i brand con flag `pubblicabile`.

## 5. Procedura: LinkedIn

LinkedIn non è leggibile da strumenti automatici e non si automatizza con credenziali. Due vie:
1. Mattia esporta i dati: LinkedIn → Impostazioni → Privacy dei dati → "Ottieni una copia dei tuoi dati" → archivio completo. Mettere `Profile.csv`, `Positions.csv`, `Skills.csv`, `Projects.csv` in `brief/linkedin/`.
2. Oppure incolla in chat screenshot o testo delle sezioni Esperienza, Informazioni, Progetti.
L'agente `linkedin-manager` produce i testi finali in `output/linkedin/`; Mattia li incolla a mano. Per la pubblicazione programmata dei post: solo API ufficiale (OAuth 2.0, `w_member_social`, `w_organization_social`).

## 6. Comandi utili

```bash
# verifica che il testo sia nell'HTML iniziale
curl -s https://mbconsulting.com | grep -c "1995"
# Lighthouse mobile
npx lighthouse https://preview.mbconsulting.com --preset=perf --form-factor=mobile --output=json --output-path=output/lh.json
# purge cache dopo publish del tema (WPVibe)
# → WordPress MCP:run_wp_cli "cache flush" oppure endpoint del plugin di cache attivo
```

## 7. Cosa chiedere a Mattia prima di iniziare (una volta sola)

1. Dominio: mbconsulting.com è suo? Altrimenti mbconsulting.it o mattiaborri.it.
2. Accesso a ymmely.com (A o B del §4) per i loghi.
3. Foto hero (desktop ≥2400px + verticale mobile) e logo vettoriale.
4. Date: Ecover, inizio Pastificio Marcello, COMEuro, Invidia (1999–2019 confermato).
5. Conferma brand packaging (Aston Martin, Cavalli, Ferragamo, Stella Bianca, Caseificio Uberti) e periodo.
6. Ok scritto dei clienti per i 12 lavori.
7. Export LinkedIn (§5). Strumento per "Prenota una call". Attivazione info@mbconsulting.com.
8. Accessi: registrar, Plesk/Seeweb, Brevo, Search Console, Google Business Profile.

## 8. Definizione di finito

Vedi §8 del prompt. In più: `assets/clienti/` popolato con inventario CSV, parete loghi online solo con brand autorizzati, `content/*.json` allineati all'anteprima, `output/DONE.md` con la prova di ogni voce.
