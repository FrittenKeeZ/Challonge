<?php

namespace Challonge\Adapter;

class CurlAdapter extends AbstractAdapter
{
    /**
     * {@inheritdoc}
     */
    public function send(Request $request)
    {
        // Append query parameters to URL.
        $url = $request->url . '?' . http_build_query($request->query);

        // Prepare cURL options.
        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_CUSTOMREQUEST => $request->method,
            CURLOPT_HEADER => true,
            CURLOPT_RETURNTRANSFER => true,
            // CURLOPT_SSL_VERIFYPEER => false,
        );

        // Add POST fields for non-GET requests.
        if ($request->method !== 'GET') {
            $options[CURLOPT_POSTFIELDS] = $request->post;
        }

        $ch = curl_init();
        curl_setopt_array($ch, $options);
        $result = curl_exec($ch);

        // Extract cURL data to free resources before any exceptions are thrown.
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $errno = curl_errno($ch);
        $error = curl_error($ch);

        curl_close($ch);

        if ($result === false) {
            throw new Exception\AdapterException($error, $errno);
        }

        $json = json_decode($result, true);
        if ($json === null) {
            throw new Exception\AdapterException(json_last_error_msg(), json_last_error());
        }

        $status = new Response\Status($code);
        $response = new Response($status, $json);

        return $response;
    }
}
