<?php

// This snippet due to the braintree_php.
if (version_compare(PHP_VERSION, '5.2.1', '<')) {
    throw new Exception('PHP version >= 5.2.1 required');
}

// This snippet (and some of the curl code) due to the Facebook SDK.
if (!function_exists('curl_init')) {
  throw new Exception('Veritrans needs the CURL PHP extension.');
}
if (!function_exists('json_decode')) {
  throw new Exception('Veritrans needs the JSON PHP extension.');
}

// Configurations
/**
 * Veritrans Configuration
 */
class Veritrans_Config {

  /**
   * Your merchant's server key
   * @static
   */
  public static $serverKey;
  /**
   * Your merchant's client key
   * @static
   */
  public static $clientKey;
  /**
   * true for production
   * false for sandbox mode
   * @static
   */
  public static $isProduction = false;
  /**
   * Set it true to enable 3D Secure by default
   * @static
   */
  public static $is3ds = false;
  /**
   * Enable request params sanitizer (validate and modify charge request params).
   * See Veritrans_Sanitizer for more details
   * @static
   */
  public static $isSanitized = false;
  /**
   * Default options for every request
   * @static
   */
  public static $curlOptions = array();

  const SANDBOX_BASE_URL = 'https://api.sandbox.midtrans.com/v2';
  const PRODUCTION_BASE_URL = 'https://api.midtrans.com/v2';
  const SNAP_SANDBOX_BASE_URL = 'https://app.sandbox.midtrans.com/snap/v1';
  const SNAP_PRODUCTION_BASE_URL = 'https://app.midtrans.com/snap/v1';

  /**
   * @return string Veritrans API URL, depends on $isProduction
   */
  public static function getBaseUrl()
  {
    return Veritrans_Config::$isProduction ?
        Veritrans_Config::PRODUCTION_BASE_URL : Veritrans_Config::SANDBOX_BASE_URL;
  }

  /**
   * @return string Snap API URL, depends on $isProduction
   */
  public static function getSnapBaseUrl()
  {
    return Veritrans_Config::$isProduction ?
        Veritrans_Config::SNAP_PRODUCTION_BASE_URL : Veritrans_Config::SNAP_SANDBOX_BASE_URL;
  }
}

// Veritrans API Resources
/**
 * API methods to get transaction status, approve and cancel transactions
 */
class Veritrans_Transaction {

  /**
   * Retrieve transaction status
   * @param string $id Order ID or transaction ID
   * @return mixed[]
   */
  public static function status($id)
  {
    return Veritrans_ApiRequestor::get(
        Veritrans_Config::getBaseUrl() . '/' . $id . '/status',
        Veritrans_Config::$serverKey,
        false);
  }

  /**
   * Approve challenge transaction
   * @param string $id Order ID or transaction ID
   * @return string
   */
  public static function approve($id)
  {
    return Veritrans_ApiRequestor::post(
        Veritrans_Config::getBaseUrl() . '/' . $id . '/approve',
        Veritrans_Config::$serverKey,
        false)->status_code;
  }

  /**
   * Cancel transaction before it's settled
   * @param string $id Order ID or transaction ID
   * @return string
   */
  public static function cancel($id)
  {
    return Veritrans_ApiRequestor::post(
        Veritrans_Config::getBaseUrl() . '/' . $id . '/cancel',
        Veritrans_Config::$serverKey,
        false)->status_code;
  }
  
  /**
   * Expire transaction before it's setteled
   * @param string $id Order ID or transaction ID
   * @return mixed[]
   */
  public static function expire($id)
  {
    return Veritrans_ApiRequestor::post(
        Veritrans_Config::getBaseUrl() . '/' . $id . '/expire',
        Veritrans_Config::$serverKey,
        false);
  }
}
// Plumbing
/**
 * Send request to Veritrans API
 * Better don't use this class directly, use Veritrans_VtWeb, Veritrans_VtDirect, Veritrans_Transaction
 */

class Veritrans_ApiRequestor {

  /**
   * Send GET request
   * @param string  $url
   * @param string  $server_key
   * @param mixed[] $data_hash
   */
  public static function get($url, $server_key, $data_hash)
  {
    return self::remoteCall($url, $server_key, $data_hash, false);
  }

  /**
   * Send POST request
   * @param string  $url
   * @param string  $server_key
   * @param mixed[] $data_hash
   */
  public static function post($url, $server_key, $data_hash)
  {
    return self::remoteCall($url, $server_key, $data_hash, true);
  }

  /**
   * Actually send request to API server
   * @param string  $url
   * @param string  $server_key
   * @param mixed[] $data_hash
   * @param bool    $post
   */
  public static function remoteCall($url, $server_key, $data_hash, $post = true)
  {
    $ch = curl_init();

    $curl_options = array(
      CURLOPT_URL => $url,
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Accept: application/json',
        'Authorization: Basic ' . base64_encode($server_key . ':')
      ),
      CURLOPT_RETURNTRANSFER => 1,
     );

    // merging with Veritrans_Config::$curlOptions
    if (count(Veritrans_Config::$curlOptions)) {
      // We need to combine headers manually, because it's array and it will no be merged
      if (Veritrans_Config::$curlOptions[CURLOPT_HTTPHEADER]) {
        $mergedHeders = array_merge($curl_options[CURLOPT_HTTPHEADER], Veritrans_Config::$curlOptions[CURLOPT_HTTPHEADER]);
        $headerOptions = array( CURLOPT_HTTPHEADER => $mergedHeders );
      } else {
        $mergedHeders = array();
      }

      $curl_options = array_replace_recursive($curl_options, Veritrans_Config::$curlOptions, $headerOptions);
    }

    if ($post) {
      $curl_options[CURLOPT_POST] = 1;

      if ($data_hash) {
        $body = json_encode($data_hash);
        $curl_options[CURLOPT_POSTFIELDS] = $body;
      } else {
        $curl_options[CURLOPT_POSTFIELDS] = '';
      }
    }

    curl_setopt_array($ch, $curl_options);

    // For testing purpose
    if (class_exists('VT_Tests') && VT_Tests::$stubHttp) {
      $result = self::processStubed($curl_options, $url, $server_key, $data_hash, $post);
    } else {
      $result = curl_exec($ch);
      // curl_close($ch);
    }


    if ($result === FALSE) {
      throw new Exception('CURL Error: ' . curl_error($ch), curl_errno($ch));
    }
    else {
      $result_array = json_decode($result);
      if (!in_array($result_array->status_code, array(200, 201, 202, 407))) {
        $message = 'Veritrans Error (' . $result_array->status_code . '): '
            . $result_array->status_message;
        throw new Exception($message, $result_array->status_code);
      }
      else {
        return $result_array;
      }
    }
  }

  private static function processStubed($curl, $url, $server_key, $data_hash, $post) {
    VT_Tests::$lastHttpRequest = array(
      "url" => $url,
      "server_key" => $server_key,
      "data_hash" => $data_hash,
      "post" => $post,
      "curl" => $curl
    );

    return VT_Tests::$stubHttpResponse;
  }
}


/**
 * Send request to Snap API
 * Better don't use this class directly, use Veritrans_Snap
 */

class Veritrans_SnapApiRequestor {

  /**
   * Send GET request
   * @param string  $url
   * @param string  $server_key
   * @param mixed[] $data_hash
   */
  public static function get($url, $server_key, $data_hash)
  {
    return self::remoteCall($url, $server_key, $data_hash, false);
  }

  /**
   * Send POST request
   * @param string  $url
   * @param string  $server_key
   * @param mixed[] $data_hash
   */
  public static function post($url, $server_key, $data_hash)
  {
    return self::remoteCall($url, $server_key, $data_hash, true);
  }

  /**
   * Actually send request to API server
   * @param string  $url
   * @param string  $server_key
   * @param mixed[] $data_hash
   * @param bool    $post
   */
  public static function remoteCall($url, $server_key, $data_hash, $post = true)
  {
    $ch = curl_init();

    $curl_options = array(
      CURLOPT_URL => $url,
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Accept: application/json',
        'Authorization: Basic ' . base64_encode($server_key . ':')
      ),
      CURLOPT_RETURNTRANSFER => 1,
    );

    // merging with Veritrans_Config::$curlOptions
    if (count(Veritrans_Config::$curlOptions)) {
      // We need to combine headers manually, because it's array and it will no be merged
      if (Veritrans_Config::$curlOptions[CURLOPT_HTTPHEADER]) {
        $mergedHeders = array_merge($curl_options[CURLOPT_HTTPHEADER], Veritrans_Config::$curlOptions[CURLOPT_HTTPHEADER]);
        $headerOptions = array( CURLOPT_HTTPHEADER => $mergedHeders );
      } else {
        $mergedHeders = array();
      }

      $curl_options = array_replace_recursive($curl_options, Veritrans_Config::$curlOptions, $headerOptions);
    }

    if ($post) {
      $curl_options[CURLOPT_POST] = 1;

      if ($data_hash) {
        $body = json_encode($data_hash);
        $curl_options[CURLOPT_POSTFIELDS] = $body;
      } else {
        $curl_options[CURLOPT_POSTFIELDS] = '';
      }
    }

    curl_setopt_array($ch, $curl_options);

    // For testing purpose
    if (class_exists('VT_Tests') && VT_Tests::$stubHttp) {
      $result = self::processStubed($curl_options, $url, $server_key, $data_hash, $post);
      $info = VT_Tests::$stubHttpStatus;
    } else {
      $result = curl_exec($ch);
      $info = curl_getinfo($ch);
      // curl_close($ch);
    }


    if ($result === FALSE) {
      throw new Exception('CURL Error: ' . curl_error($ch), curl_errno($ch));
    }
    else {
      $result_array = json_decode($result);
      if ($info['http_code'] != 201) {
        $message = 'Veritrans Error (' . $info['http_code'] . '): '
            . implode(',', $result_array->error_messages);
        throw new Exception($message, $info['http_code']);
      }
      else {
        return $result_array;
      }
    }
  }

  private static function processStubed($curl, $url, $server_key, $data_hash, $post) {
    VT_Tests::$lastHttpRequest = array(
      "url" => $url,
      "server_key" => $server_key,
      "data_hash" => $data_hash,
      "post" => $post,
      "curl" => $curl
    );

    return VT_Tests::$stubHttpResponse;
  }
}


/**
 * Read raw post input and parse as JSON. Provide getters for fields in notification object
 *
 * Example:
 *
 * ```php
 *   $notif = new Veritrans_Notification();
 *   echo $notif->order_id;
 *   echo $notif->transaction_status;
 * ```
 */
class Veritrans_Notification {

  private $response;

  public function __construct($input_source = "php://input")
  {
    $raw_notification = json_decode(file_get_contents($input_source), true);
    $status_response = Veritrans_Transaction::status($raw_notification['transaction_id']);
    $this->response = $status_response;
  }

  public function __get($name)
  {
    if (array_key_exists($name, $this->response)) {
      return $this->response->$name;
    }
  }
}



/**
 * Provide charge and capture functions for VT-Direct
 */
class Veritrans_VtDirect {

  /**
   * Create VT-Direct transaction.
   *
   * @param mixed[] $params Transaction options
   */
  public static function charge($params)
  {
    $payloads = array(
        'payment_type' => 'credit_card'
    );

    if (array_key_exists('item_details', $params)) {
      $gross_amount = 0;
      foreach ($params['item_details'] as $item) {
        $gross_amount += $item['quantity'] * $item['price'];
      }
      $payloads['transaction_details']['gross_amount'] = $gross_amount;
    }

    $payloads = array_replace_recursive($payloads, $params);

    if (Veritrans_Config::$isSanitized) {
      Veritrans_Sanitizer::jsonRequest($payloads);
    }

    $result = Veritrans_ApiRequestor::post(
        Veritrans_Config::getBaseUrl() . '/charge',
        Veritrans_Config::$serverKey,
        $payloads);

    return $result;
  }

  /**
   * Capture pre-authorized transaction
   *
   * @param string $param Order ID or transaction ID, that you want to capture
   */
  public static function capture($param)
  {
    $payloads = array(
      'transaction_id' => $param,
    );

    $result = Veritrans_ApiRequestor::post(
          Veritrans_Config::getBaseUrl() . '/capture',
          Veritrans_Config::$serverKey,
          $payloads);

    return $result;
  }
}



/**
 * Create VtWeb transaction and return redirect url
 *
 */
class Veritrans_VtWeb {

  /**
   * Create VT-Web transaction
   *
   * Example:
   *
   * ```php
   *   $params = array(
   *     'transaction_details' => array(
   *       'order_id' => rand(),
   *       'gross_amount' => 10000,
   *     )
   *   );
   *   $paymentUrl = Veritrans_Vtweb::getRedirectionUrl($params);
   *   header('Location: ' . $paymentUrl);
   * ```
   *
   * @param array $params Payment options
   * @return string Redirect URL to VT-Web payment page.
   * @throws Exception curl error or veritrans error
   */
  public static function getRedirectionUrl($params)
  {
    $payloads = array(
      'payment_type' => 'vtweb',
      'vtweb' => array(
        // 'enabled_payments' => array('credit_card'),
        'credit_card_3d_secure' => Veritrans_Config::$is3ds
      )
    );

    if (array_key_exists('item_details', $params)) {
      $gross_amount = 0;
      foreach ($params['item_details'] as $item) {
        $gross_amount += $item['quantity'] * $item['price'];
      }
      $payloads['transaction_details']['gross_amount'] = $gross_amount;
    }

    $payloads = array_replace_recursive($payloads, $params);

    if (Veritrans_Config::$isSanitized) {
      Veritrans_Sanitizer::jsonRequest($payloads);
    }

    $result = Veritrans_ApiRequestor::post(
        Veritrans_Config::getBaseUrl() . '/charge',
        Veritrans_Config::$serverKey,
        $payloads);

    return $result->redirect_url;
  }
}



/**
 * Create Snap payment page and return snap token
 *
 */
class Veritrans_Snap {

  /**
   * Create Snap payment page
   *
   * Example:
   *
   * ```php
   *   $params = array(
   *     'transaction_details' => array(
   *       'order_id' => rand(),
   *       'gross_amount' => 10000,
   *     )
   *   );
   *   $paymentUrl = Veritrans_Snap::getSnapToken($params);
   * ```
   *
   * @param array $params Payment options
   * @return string Snap token.
   * @throws Exception curl error or veritrans error
   */
  public static function getSnapToken($params)
  {
    $payloads = array(
      'credit_card' => array(
        // 'enabled_payments' => array('credit_card'),
        'secure' => Veritrans_Config::$is3ds
      )
    );

    if (array_key_exists('item_details', $params)) {
      $gross_amount = 0;
      foreach ($params['item_details'] as $item) {
        $gross_amount += $item['quantity'] * $item['price'];
      }
      $params['transaction_details']['gross_amount'] = $gross_amount;
    }

    if (Veritrans_Config::$isSanitized) {
      Veritrans_Sanitizer::jsonRequest($params);
    }

    $params = array_replace_recursive($payloads, $params);

    $result = Veritrans_SnapApiRequestor::post(
        Veritrans_Config::getSnapBaseUrl() . '/transactions',
        Veritrans_Config::$serverKey,
        $params);

    return $result->token;
  }
}

// Sanitization
/**
 * Request params filters.
 *
 * It truncate fields that have length limit, remove not allowed characters from other fields
 *
 * This feature is optional, you can control it with Veritrans_Config::$isSanitized (default: false)
 */
class Veritrans_Sanitizer {
  private $filters;

  public function __construct()
  {
    $this->filters = array();
  }

  /**
   * Validates and modify data
   * @param mixed[] $json
   */
  public static function jsonRequest(&$json)
  {
    $keys = array('item_details', 'customer_details');
    foreach ($keys as $key) {
      if (!array_key_exists($key, $json)) continue;

      $camel = static::upperCamelize($key);
      $function = "field$camel";
      static::$function($json[$key]);
    }
  }

  private static function fieldItemDetails(&$items)
  {
    foreach ($items as &$item) {
      $id = new self;
      $item['id'] = $id
          ->maxLength(50)
          ->apply($item['id']);
      $name = new self;
      $item['name'] = $name
          ->maxLength(50)
          ->apply($item['name']);
    }
  }

  private static function fieldCustomerDetails(&$field)
  {
    $first_name = new self;
    $field['first_name'] = $first_name
        ->maxLength(20)
        ->apply($field['first_name']);
    if (array_key_exists('last_name', $field)) {
      $last_name = new self;
      $field['last_name'] = $last_name
          ->maxLength(20)
          ->apply($field['last_name']);
    }
    $email = new self;
    $field['email'] = $email
        ->maxLength(45)
        ->apply($field['email']);

    static::fieldPhone($field['phone']);

    $keys = array('billing_address', 'shipping_address');
    foreach ($keys as $key) {
      if (!array_key_exists($key, $field)) continue;

      $camel = static::upperCamelize($key);
      $function = "field$camel";
      static::$function($field[$key]);
    }
  }

  private static function fieldBillingAddress(&$field)
  {
    $fields = array(
        'first_name'   => 20,
        'last_name'    => 20,
        'address'      => 200,
        'city'         => 20,
        'country_code' => 10
      );

    foreach ($fields as $key => $value) {
      if (array_key_exists($key, $field)) {
        $self = new self;
        $field[$key] = $self
            ->maxLength($value)
            ->apply($field[$key]);
      }
    }

    if (array_key_exists('postal_code', $field)) {
      $postal_code = new self;
      $field['postal_code'] = $postal_code
          ->whitelist('A-Za-z0-9\\- ')
          ->maxLength(10)
          ->apply($field['postal_code']);
    }
    if (array_key_exists('phone', $field)) {
      static::fieldPhone($field['phone']);
    }
  }

  private static function fieldShippingAddress(&$field)
  {
    static::fieldBillingAddress($field);
  }

  private static function fieldPhone(&$field)
  {
    $plus = substr($field, 0, 1) === '+' ? true : false;
    $self = new self;
    $field = $self
        ->whitelist('\\d\\-\\(\\) ')
        ->maxLength(19)
        ->apply($field);

    if ($plus) $field = '+' . $field;
    $self = new self;
    $field = $self
        ->maxLength(19)
        ->apply($field);
  }

  private function maxLength($length)
  {
    $this->filters[] = function($input) use($length) {
      return substr($input, 0, $length);
    };
    return $this;
  }

  private function whitelist($regex)
  {
    $this->filters[] = function($input) use($regex) {
      return preg_replace("/[^$regex]/", '', $input);
    };
    return $this;
  }

  private function apply($input)
  {
    foreach ($this->filters as $filter) {
      $input = call_user_func($filter, $input);
    }
    return $input;
  }

  private static function upperCamelize($string)
  {
    return str_replace(' ', '',
        ucwords(str_replace('_', ' ', $string)));
  }
}