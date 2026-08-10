# ymmely.com/new — stato del sito in costruzione

Sito live in costruzione (non tocca il sito attuale). Sede: **Lugano**. Persone: **Mattia Borri**, **Erika Varriale**.

| Pagina | URL | ID |
|---|---|---|
| Home reattiva + Brief Vivente | https://ymmely.com/new/ | 9114 |
| Studio (Mattia + Erika) | https://ymmely.com/new/studio/ | 9116 |
| Lavori | https://ymmely.com/new/work/ | 9117 |
| Contatti | https://ymmely.com/new/contatti/ | 9118 |

Tutte a template "tela vuota" (elementor_canvas), design coerente (scuro, duotone magenta→ciano).

## Fase 2 — Brief Vivente con Claude vero (da attivare)
Il modulo AI in home ora gira in **demo lato browser** (fallback). Per collegarlo a Claude servono 2 step:
1. Installare il plugin **WPCode** (gratuito) — permette di aggiungere lo snippet PHP dell'endpoint.
2. Fornire una **chiave API Anthropic**, salvata come opzione `ymmely_anthropic_key`.

Endpoint pronto in `docs/brief-vivente-endpoint.php` (REST `POST /wp-json/ymmely/v1/brief`, modello `claude-sonnet-5`, output JSON strutturato, fallback sicuro). Poi il JS della home chiamerà l'endpoint e userà la demo solo se offline.
