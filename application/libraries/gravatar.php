<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); // Remove line to use class outside of codeigniter


class gravatar
{
    private $base_url = 'http://www.gravatar.com/';
    private $secure_base_url = 'https://secure.gravatar.com/';

    
    public function set_email($email)
    {
        $email = strtolower($email);
        $email = trim($email);

        if ( ! filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
            return md5($email);
        }

        return NULL;
    }

    
    public function get_gravatar($email, $rating = NULL, $size = NULL, $default_image = NULL, $secure = NULL)
    {
        $hash = $this->set_email($email);

        if ($hash === NULL) {
            // $hash has to be set to a value so the gravatar site can return a default image
            $hash = 'invalid_email';
        }

        $query_string = NULL;
        $options = array();

        if ($rating !== NULL) {
            $options['r'] = $rating;
        }

        if ($size !== NULL) {
            $options['s'] = $size;
        }

        if ($default_image !== NULL) {
            $options['d'] = urlencode($default_image);
        }

        if (count($options) > 0) {
            $query_string = '?'. http_build_query($options);
        }

        if ($secure !== NULL) {
            $base = $this->secure_base_url;
        } else {
            $base = $this->base_url;
        }

        return $base .'avatar/'. $hash . $query_string;
    }

    
    public function get_profile($email, $fetch_method = 'file')
    {
        $hash = $this->set_email($email);

        if ($hash === NULL) {
            // A hash value of NULL will return no xml so the method returns NULL
            return NULL;
        }

        libxml_use_internal_errors(TRUE);

        if ($fetch_method === 'file') {
            if (ini_get('allow_url_fopen') == FALSE) {
                return NULL;
            }

            $str = file_get_contents($this->base_url . $hash .'.xml');
        }

        if ($fetch_method === 'curl') {
            if ( ! function_exists('curl_init')) {
                return NULL;
            }

            $ch = curl_init();
            $options = array(
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_POST => TRUE,
                CURLOPT_URL => $this->secure_base_url . $hash .'.xml',
                CURLOPT_TIMEOUT => 3
            );
            curl_setopt_array($ch, $options);
            $str = curl_exec($ch);
        }

        $xml = simplexml_load_string($str);

        if ($xml === FALSE) {
            $errors = array();
            foreach (libxml_get_errors() as $error) {
                $errors[] = $error->message.'\n';
            }
            $error_string = implode('\n', $errors);
            throw new Exception('Failed loading XML\n'. $error_string);
        } else {
            return $xml->entry;
        }
    }
}

