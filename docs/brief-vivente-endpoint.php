<?php
/**
 * YMMELY — Brief Vivente: endpoint REST che genera un concept di campagna con Claude.
 * Da incollare in WPCode (tipo: PHP, location: everywhere) SENZA il tag <?php.
 * Prerequisito: salvare la chiave API con
 *   update_option('ymmely_anthropic_key', 'sk-ant-...');
 */
add_action('rest_api_init', function () {
    register_rest_route('ymmely/v1', '/brief', array(
        'methods'  => 'POST',
        'permission_callback' => '__return_true',
        'callback' => function (WP_REST_Request $req) {
            $key = get_option('ymmely_anthropic_key');
            if (!$key) {
                return new WP_REST_Response(array('error' => 'no_key'), 503); // il client usa la demo
            }
            $brand = sanitize_text_field($req->get_param('brand'));
            if (!$brand) { $brand = 'un brand che vuole farsi ricordare'; }

            $system = "Sei il direttore creativo di Ymmely, agenzia di 'Digital Reactive Communication' a Lugano. "
                . "Tono: reattivo, essenziale, cinematografico, colto. Niente buzzword (rivoluzionario, disruptive, 360, all'avanguardia). "
                . "Dato cosa vende un cliente, rispondi SOLO con JSON: "
                . '{"tagline": string (max 6 parole), "territorio": string (2 frasi), "mood": string (5 keyword separate da ·), "media": [4 stringhe brevi]}';

            $body = wp_json_encode(array(
                'model' => 'claude-sonnet-5',
                'max_tokens' => 800,
                'system' => $system,
                'messages' => array(array('role' => 'user', 'content' => "Cliente: " . $brand)),
            ));

            $res = wp_remote_post('https://api.anthropic.com/v1/messages', array(
                'timeout' => 30,
                'headers' => array(
                    'content-type' => 'application/json',
                    'x-api-key' => $key,
                    'anthropic-version' => '2023-06-01',
                ),
                'body' => $body,
            ));

            if (is_wp_error($res) || wp_remote_retrieve_response_code($res) !== 200) {
                return new WP_REST_Response(array('error' => 'upstream'), 502); // il client usa la demo
            }
            $data = json_decode(wp_remote_retrieve_body($res), true);
            $text = isset($data['content'][0]['text']) ? $data['content'][0]['text'] : '';
            $parsed = json_decode($text, true);
            if (!$parsed || empty($parsed['tagline'])) {
                return new WP_REST_Response(array('error' => 'parse'), 502);
            }
            return new WP_REST_Response($parsed, 200);
        },
    ));
});
