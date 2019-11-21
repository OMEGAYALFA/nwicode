<?php

namespace Nwicode;

use Nwicode\VestaCP\Api as VestaCPApi;
use Zend_Registry;
use Api_Model_Key;

/**
 * Class VestaCP
 * @package Nwicode
 *
 * @replay 4.16.1
 */
class VestaCP
{

    /**
     * @var Api
     */
    protected $api;

    /**
     * @var mixed|null
     */
    public $logger = null;

    /**
     * @var array
     */
    protected $config = [
        "host" => "",
        "username" => "",
        "password" => "",
        "webspace" => null,
    ];

    /**
     * VestaCP constructor.
     * @throws Exception
     * @throws \Zend_Exception
     */
    public function __construct()
    {
        $this->logger = Zend_Registry::get("logger");
        if (version_compare(phpversion(), "5.6", "<")) {
            $this->logger->info("[Nwicode_VestaCP] requires php 5.6+");
            throw new Exception(__("[Nwicode_VestaCP] requires php 5.6+"));
        }

        $vestacp_api = Api_Model_Key::findKeysFor("vestacp");

        $this->config["host"] = $vestacp_api->getHost();
        $this->config["username"] = $vestacp_api->getUser();
        $this->config["password"] = $vestacp_api->getPassword();
        $this->config["webspace"] = $vestacp_api->getWebspace();

        $this->api = new VestaCPApi(
            $this->config["host"], $this->config["username"], $this->config["password"], $this->config["webspace"]);
    }

    /**
     * @param $ssl_certificate
     * @return bool
     * @throws \Nwicode\Exception
     */
    public function updateCertificate($ssl_certificate)
    {
        // @note From here, server may reload, and then interrupt the connection
        // This is normal behavior, as it's reloading the SSL Certificate.

        if (version_compare(phpversion(), "5.6", "<")) {
            $this->logger->info("[Nwicode_VestaCP] requires php 5.6+");
            throw new \Nwicode\Exception(__("[Nwicode_VestaCP] requires php 5.6+"));
        }

        $this->api->updateDomainVesta($ssl_certificate);

        return true;

        // Please consider you can never have the acknowledgement
    }
}