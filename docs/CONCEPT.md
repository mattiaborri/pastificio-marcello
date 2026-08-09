# Concept — Il nuovo ymmely.com

## Idea centrale: *"La comunicazione che reagisce."*

Il payoff di Ymmely — **Digital Reactive Communication** — smette di essere una frase e diventa
l'**esperienza** del sito. Ogni elemento *reagisce*: al cursore, all'ora, all'input del visitatore.
Il sito è la prova del metodo.

## La sorpresa AI — **"Il Brief Vivente"**

Il modulo-firma del sito. Il visitatore scrive **cosa vende** (o sceglie un esempio) e il *motore
reattivo* di Ymmely compone dal vivo un mini-concept di campagna:

- **Tagline** su misura
- **Territorio creativo** (la direzione emotiva)
- **Mood visivo & sonoro**
- **Media mix reattivo**

Con reveal a macchina-da-scrivere, sembra un direttore creativo AI che pensa in tempo reale. È
memorabile, condivisibile, e comunica in 10 secondi *cosa sa fare l'agenzia*.

- **Prototipo (demo lato browser):** logica combinatoria che classifica l'input e compone il brief.
- **Versione di produzione:** collegato a un vero LLM + la brand knowledge di Ymmely, con guardrail
  di tono e output curati. Opzionale: salvataggio del brief come "biglietto da visita" da scaricare/inviare.

## Direzione di design

- **Mondo:** scuro, cinematografico, premium. Silenzio e grande respiro tipografico.
- **Tipografia:** grotesque svizzero-modernista a scala enorme (display) + serif editoriale per il
  manifesto (emozione) + mono per l'interfaccia "reactive engine".
- **Accento:** duotone reattivo **magenta `#FF2E7E` → ciano `#17E0C4`**, usato come gradiente vivo
  (non il solito verde acido / vermiglio isolato). Tutto il resto resta neutro caldo.
- **Movimento:** hero con campo generativo (flow-field) che reagisce al mouse; reveal allo scroll;
  micro-interazioni. Sempre con fallback `prefers-reduced-motion`.

## Struttura pagina (home)

1. **Hero vivo** — headline "La comunicazione che reagisce" + campo generativo reattivo.
2. **Marquee clienti** — Aston Martin · BMW · Ferragamo · Studio Rocco.
3. **Il metodo** — Sense → Shape → React (il ciclo reattivo).
4. **Il Brief Vivente** — il momento AR sorprendente.
5. **Manifesto** — serif editoriale, la visione dello studio.
6. **Lavori selezionati** — card generative che si accendono all'hover.
7. **CTA / contatti**.

## Roadmap proposta

| Fase | Obiettivo | Stato |
|---|---|---|
| 0 | Audit + concept + prototipo home | ✅ (questo repo) |
| 1 | Audit tecnico completo del sito attuale | ⏳ richiede accesso |
| 2 | Design system completo + tutte le pagine (About, Lavori, News, Contatti) | ⬜ |
| 3 | "Brief Vivente" collegato a LLM reale + brand knowledge | ⬜ |
| 4 | Contenuti definitivi, SEO, accessibilità, performance | ⬜ |
| 5 | Deploy su **new.ymmely.com**, QA, redirect map | ⬜ |
| 6 | Go-live: sostituzione del sito attuale | ⬜ |

## Note tecniche prototipo
- File: `index.html` — **self-contained** (nessuna dipendenza esterna, CSP-safe).
- Canvas per hero e card generative; IntersectionObserver per i reveal; generatore combinatorio per il brief.
- Prossimo step tecnico: estrarre un design system, poi valutare framework (Astro consigliato per
  sito statico veloce + isole interattive) quando definiamo build e deploy.
