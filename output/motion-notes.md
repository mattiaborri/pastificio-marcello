# motion-notes.md — MBCONSULTING-anteprima-v2.html

Enhanced, hardened standalone preview built from the current working preview
(`MBCONSULTING-anteprima.html`). Vanilla JS only, no libraries, one `<script>`
before `</body>` plus a tiny failsafe script at the top of `<body>`. Design,
palette, copy and the `#referenze` logo wall are untouched.

## Cosa è cambiato

**Robustezza (priorità assoluta).** Lo stato "nascosto" del reveal ora vive solo
sotto `html.js`: senza JS il contenuto è visibile di default. Il piccolo script
in testa a `<body>` aggiunge `.js`, ma installa anche due reti di sicurezza: un
handler `window.error` che rimuove `.js` (se lo script principale non parte),
e un timeout di 2,5 s che forza il reveal se nessun `.rv.on` è comparso.
L'osservatore di reveal è registrato per primo, prima di qualsiasi codice che
possa lanciare, ed è in `try/catch` con fallback `revealAll()`. Canvas, mappa,
scheda e pista sono ognuno in `try/catch` isolato. La mappa (interamente
generata da JS) ha un **fallback statico** dentro `#cielo`: la lista delle 11
aree con link `#area-01…11`, sostituita solo a costruzione riuscita — se il JS
muore, le aree restano leggibili e navigabili.

**Hero canvas fluido.** Metaball radiali blu-mare che seguono il puntatore con
smoothing, onde di schiuma sottili e increspature che partono dal tocco
(`pointerdown`). DPR limitato a `min(devicePixelRatio, 1.5)`. Il loop `rAF` si
ferma quando la hero è fuori schermo (IntersectionObserver) e su
`document.hidden` (visibilitychange), e riparte da solo. `prefers-reduced-motion`
= un solo fotogramma statico, nessun loop, più un gradiente CSS di riserva sul
canvas.

**Mappa "costellazione" (desktop).** Generata dall'array `AREE`. I fili si
disegnano progressivamente (stroke-dashoffset con `--len` calcolato via
`getTotalLength`) e i nodi entrano in cascata quando la sezione entra in vista.
Hover/focus di un nodo accende i tre fili collegati (raggio + due archi) e
attenua gli altri; anello pulsante attorno alla regia. Tutto disattivato sotto
reduced-motion (`.draw` presente ma animazioni annullate).

**Fisarmonica liquida (<900px).** Invariata nella logica (onda dal punto toccato,
una sola riga aperta, cascata allo scroll), ora dentro `buildMappa` con fallback.

**Scheda / pista / progress / body.chiaro.** Comportamento identico
all'anteprima (schermo intero, Cosa comprende / Come si lavora / Cosa ricevi,
prev-next, frecce, Esc, deep-link; pista orizzontale guidata dallo scroll su
desktop con snap su mobile; barra 3px; toggle UI scura sulle sezioni chiare),
ma con guardie sui `getElementById`, gestione `extra<=0`, e `resize` aggiunto al
toggle `chiaro`.

## Performance / FPS (stima)

Non misurato su hardware reale in questo ambiente; stima ragionata sul carico.
Per frame il canvas fa: 3 `fillRect` a schermo intero con gradiente radiale
(la parte più costosa in fill-rate), 7 polilinee da 64 segmenti, fino a 6
increspature. A DPR ≤ 1,5 il buffer resta contenuto.

- Desktop moderno: ~60 fps stabili.
- Telefono di fascia media (es. Pixel 6a / iPhone SE): ~50–60 fps; il collo di
  bottiglia è il fill-rate dei gradienti radiali full-screen. Le pause fuori
  schermo e su tab nascosta eliminano il consumo quando l'hero non è visibile
  (di fatto il canvas gira solo nel primo viewport).

Mitigazioni già attive: DPR cap 1.5, stop offscreen + hidden, listener scroll
`passive`, `will-change: transform` sulla pista, SVG statico (nessun rAF sulla
mappa). Se emergesse jank su device molto deboli, ridurre le metaball da 3 a 2
o le onde da 7 a 4 è un one-liner.

## Reduced-motion

`const rm = matchMedia('(prefers-reduced-motion: reduce)')`. Canvas: un solo
fotogramma, nessun loop, gradiente CSS di riserva. Reveal e righe fisarmonica:
forzati visibili via media query (`.js .rv{opacity:1!important}`). Costellazione:
niente disegno progressivo né pulse. Il CSS globale già azzera animazioni e
transizioni sotto reduced-motion.

## Rischi / note

- `elementFromPoint` in `chiaro()` è euristico (come nell'originale); è in
  `try/catch` e non blocca nulla se fallisce.
- Il fallback statico della mappa e quello del canvas raddoppiano leggermente il
  markup, ma restano invisibili/irrilevanti a JS funzionante.
- `String.prototype.padStart` e `IntersectionObserver`: presenti su tutti i
  browser target; `supIO` degrada comunque a "mostra tutto".
- File autoconsistente (~104 KB, immagini base64 incluse), apribile in un
  browser senza rete. Il kit Adobe Fonts resta quello di MIOBUK (solo anteprima).
