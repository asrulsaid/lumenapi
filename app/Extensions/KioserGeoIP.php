<?php


namespace App\Extensions;

use CodeOrange\GeoIP\GeoIP;
use GeoIp2\Database\Reader;


class KioserGeoIP extends GeoIP
{
    /**
     * Client IP address.
     *
     * @var float
     */
    protected $client_ip;

    /**
     * Current environment.
     *
     * @var string
     */
    protected $environment;

    /**
     * Default location data.
     *
     * @var array
     */
    protected  $default_record = [
            'ip' => '127.0.0.1',
            'isoCode' => 'ID',
            'country' => 'Indonesia',
            'city' => 'Sulawesi Selatan',
            'state' => '',
            'postal_code' => '90653',
            'lat' => 119.548080,
            'lon' => -4.836704,
            'timezone' => 'Asia/Jakarta',
            'continent' => 'NA',
            'default' => true,
    ];

    /**
     * Create a new GeoIP instance.
     */
    public function __construct() {
        $this->client_ip = $this->getClientIP();
        $this->environment = app()->environment();
    }

    /**
     * Retrieve location data from database.
     *
     * @param float $ip
     * @return object
     * @throws \Exception If the IP address given is not valid or falls within a private or reserved range
     */
    public function getLocation($ip = null) {
        // If no IP given then get client IP
        if (!$ip) {
            $ip = $this->getClientIp();
        }

        // if were not in production and ip is 127.0.0.1 use default record
        if (($this->environment != 'production') && ($ip == '127.0.0.1')) {
            return $record = $this->default_record;
        } else {
            // Check IP to make sure it is valid
            if (!$this->checkIp($ip)) {
                throw new \Exception('IP Address is either not a valid IPv4/IPv6 address or falls within the private or reserved ranges');
            }

            $reader = new Reader(storage_path('app/geoip.mmdb'));
            $record = $reader->city($ip);
        }

        return $record;
    }

    /**
     * Checks IP to make sure it is a valid IPv4 or IPv6 address and
     * not within a private or reserved range.
     *
     * @param float $ip
     *
     * @return float|bool
     */
    public function checkIp($ip) {
        return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_IPV6 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE);
    }

    /**
     * Gets the client IP address.
     *
     * @return float
     */
    protected function getClientIp() {
        if (getenv('HTTP_CLIENT_IP')) {
            $ipaddress = getenv('HTTP_CLIENT_IP');
        } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        } elseif (getenv('HTTP_X_FORWARDED')) {
            $ipaddress = getenv('HTTP_X_FORWARDED');
        } elseif (getenv('HTTP_FORWARDED_FOR')) {
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        } elseif (getenv('HTTP_FORWARDED')) {
            $ipaddress = getenv('HTTP_FORWARDED');
        } elseif (getenv('REMOTE_ADDR')) {
            $ipaddress = getenv('REMOTE_ADDR');
        } else {
            $ipaddress = '127.0.0.1';
        }

        return $ipaddress;
    }

    /**
     * Return client_ip.
     *
     * @return float
     */
    public function getIp() {
        return $this->client_ip;
    }
    /**
     * @return string
     */
    public function getEnvironment(): string
    {
        return $this->environment;
    }

    /**
     * @param string $environment
     */
    public function setEnvironment(string $environment): void
    {
        $this->environment = $environment;
    }

    /**
     * @return array
     */
    public function getDefaultRecord(): array
    {
        return $this->default_record;
    }

    /**
     * @param array $default_record
     */
    public function setDefaultRecord(array $default_record): void
    {
        $this->default_record = $default_record;
    }

}