# UX review — mbconsulting.com

Verifica condotta su `MBCONSULTING-anteprima.html` (working preview con muro loghi). Voce agenzia in terza persona rispettata; Erika Varriale assente; nessun nome cliente nelle 11 aree; YMMELY una riga sola (§agenzia). I numeri di riga citati sono di quel file.

## 1. Wireframe testuali (375 / 768 / 1440)

**Hero** — 375: foto full-bleed + canvas; logo alto-sx, MENU alto-dx, barra 3px; contenuto ancorato in basso: H1 "Creative *liquid* marketing." (44px), paragrafo, "scorri" verticale dx. · 768: idem, H1 ~73px. · 1440: H1 fino 128px, testo max 11ch/46ch, "scorri" a filo gutter 88px.

**Mappa 11 aree** — 375/768 (<900): titolo + sottotitolo, poi **fisarmonica** `.fisa`: banda "Regia" notte, 11 righe [numero 34px | titolo | +]; tap → onda liquida riempie la riga, apre corpo (una sola aperta). · 1440: titolo, poi **SVG cielo** con nodo centrale "Regia" e 11 nodi su ellisse collegati da fili; hover/focus evidenzia; fisarmonica nascosta.

**Scheda area** — tutte le larghezze: overlay full-screen notte (tendina dal basso), max 1000px centrato. Ordine: X chiudi (fisso alto-dx), "Area 0X di 11", H2, descrizione, **Cosa comprende** (lista), **Come si lavora**, **Cosa ricevi**, bottone blu → contatto, nav ‹Precedente | 0X/11 | Successiva›. Su 1440 stessa colonna singola più larga.

**Lavori (pista)** — 375/768: sezione statica, titolo, 12 card in fila `overflow-x:auto` con scroll-snap, swipe orizzontale; sottotitolo desktop nascosto; sotto, riga "Brand …". · 1440: sezione sticky alta 100vh, lo scroll verticale traduce la pista in orizzontale (scroll-driven), card 420px.

**Muro loghi** — 375: griglia 2 col; 768: 3 col; 1440: 6 col; celle 3:2, loghi in grayscale→colore all'hover, titolo "Clienti e referenze" + nota.

**Competenze** — 375/768: 3 colonne impilate, la prima (Direzione, fondo notte) in testa; 1440: 3 colonne affiancate.

**Agenzia** — 375/768: H2, timeline verticale (barra blu sx) 1995→oggi, riga YMMELY. · 1440: H2 sticky a sx, timeline a dx.

**Metodo** — tutte: freccia "→", H2, 4 passi con etichetta a dx. Nessun CTA.

**Contatto** — 375: H2, sottotitolo, 4 card azione impilate (WhatsApp primaria, Chiama, Email, Prenota), colophon. · 768: 2×2; · 1440: 4 in fila.

## 2. Above-the-fold iPhone 375 (hero, senza scroll)
Visibili: logo MB, orb MENU, barra avanzamento, foto+canvas, **H1 completo**, primo paragrafo, indicatore "scorri". Corretto per il "capire in 3 secondi". Manca un CTA esplicito: l'unica azione above-the-fold è aprire il menu o scorrere (vedi §5).

## 3. Menu overlay (touch) e pista

**Menu** — apre da orb: tendina `clip-path` dall'alto, voci a cascata; overflow body bloccato (l.41); `aria-expanded` aggiornato (l.413); focus va alla 1ª voce (l.413); tap voce chiude (l.415); **Esc** chiude (l.414). *Manca il focus-trap*: con Tab il focus esce dietro l'overlay; alla chiusura il focus non torna sull'orb.

**Pista** — desktop (≥900) scroll-driven via `translateX` (l.456-459); mobile (<900) carosello nativo `scroll-snap-type:x mandatory` + `scroll-snap-align:start` (l.194). Coerente col brief. Le card non sono raggiungibili da tastiera (contenuto orizzontale solo con scroll).

## 4. Verifica soglie (violazioni)
- **Orb ≥52px: FALLITO.** `.orb` l.24 `padding:6px 0`, font 11px → altezza tap ~25px. Ingrandire l'area toccabile a ≥52px.
- **Voci menu ≥34px: FALLITO a 375.** `.voci a` l.45 `clamp(30px,6vw,72px)` → 30px; tap ~45px (<48). Alzare min a 34px e padding.
- **Testo ≥14px: violazioni.** `.op .stack` 13px (l.192), `.op .anno` 13px (l.193), `.navfull .base` 12px (l.57), `.colophon` 12px (l.236). Le etichette boreal a 11px (tag hero l.67, `.btn` l.77, numeri) sono per specifica luxury ma sotto soglia: decidere se il minimo 14px vale solo per il testo corrente (consigliato) tenendo le label 11px come eccezione dichiarata.
- **Tap ≥48px: violazioni.** `.scheda .chiudi` 32×32 (l.161); `.scheda-nav button` ~33px (l.177); `.marchio img` 22px (l.32). Portare a ≥48px.
- **Card 84vw + snap: OK.** `.op` l.187 `min(84vw,420px)` + snap l.194.
- **Bottoni ≥48px: OK.** `.btn` min-height 52px (l.77); `.azioni a` 150px (l.230).

## 5. Un'azione per schermo / dead-end
- Hero: solo scroll/menu — **nessun CTA** (accettabile ma debole).
- Mappa: tap area → scheda ✓.
- Scheda: bottone → contatto ✓.
- **Lavori: DEAD-END.** Le `<article class="op">` non sono link e non c'è CTA: si leggono ma non portano da nessuna parte.
- **Muro loghi: DEAD-END** (passivo, nessuna azione onward).
- **Competenze: DEAD-END** (nessun CTA verso contatto).
- **Agenzia:** unica azione è il link esterno YMMELY → porta **fuori sito**, nessun CTA interno.
- **Metodo: DEAD-END** (nessun CTA).
- Contatto: 4 azioni dirette ✓ — ma **"Prenota una call" è `href="#"`** (l.406), link morto finché non si collega Calendar/Calendly.

## 6. Top issue da correggere prima del build (priorità)
1. **Orb tap target ~25px** (l.24): sotto la metà della soglia, è il comando più usato su mobile.
2. **Focus-trap assente** nel menu overlay e nella scheda; ripristino focus sull'orb alla chiusura (l.413-415).
3. **Lavori senza azione**: rendere le card link (a scheda/case study o a contatto) — oggi è il blocco più grande senza sbocco.
4. **"Prenota una call" morto** (l.406): collegare lo strumento reale o rimuovere.
5. **Voci menu 30px<34px** a 375 (l.45) e tap <48px.
6. **Testo <14px**: stack/anno card, base menu, colophon (l.192-193, 57, 236); chiarire l'eccezione 11px per le label.
7. **Chiudi scheda e nav prev/next <48px** (l.161, 177).
8. **Muro loghi**: i loghi puntano a `ymmely.com` (l.342+) — in produzione self-hosted; e mostrare solo brand con `pubblicabile`.
