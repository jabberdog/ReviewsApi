<?php

/**
 * Class ReviewsApi
 * https://beta.reviews.co.uk/integration/api#productcollection
 */
class ReviewsApi
{
    /**
     * @var string
     */
    protected static $endpoint = 'https://api.reviews.co.uk/product/review?%s';

    /**
     * @var string
     */
    protected static $api_key = '<YOUR_API_KEY>';

    /**
     * @param $data
     * @return mixed
     */
    public static function sendRequest($data)
    {
        $requestEndpoint = sprintf(static::$endpoint, http_build_query($data));

        $ch = curl_init($requestEndpoint);
        curl_setopt_array($ch, array(
            CURLOPT_URL => $requestEndpoint,
            CURLOPT_TIMEOUT => 20,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        if ( curl_error($ch) ) {
            echo('Error: ' . curl_error($ch) . ' - Code: ' . curl_errno($ch));
        }

        return $response;
    }

    /**
     * @param $request
     * @return mixed
     */
    public static function productReviewPublish($request)
    {
        $data = array_merge($request, array(
            'store' => '<YOUR_STORE_NAME>'
        ));

        $response = json_decode(static::sendRequest($data), true);

        if ( !empty($response['reviews']['total']) ) {
            return array(
                'success' => true,
                'response' => $response
            );
        }

        return array(
            'success' => false,
            'response' => sprintf('%s does not have any reviews', $request['sku'])
        );
    }
}
