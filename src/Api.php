<?php
/**
 * BSeller Platform | B2W - Companhia Digital
 *
 * Do not edit this file if you want to update this module for future new versions.
 *
 * @category  SkyHub
 * @package   ${MAGENTO_MODULE_NAMESPACE}_${MAGENTO_MODULE}
 *
 * @copyright Copyright (c) 2018 B2W Digital - BSeller Platform. (http://www.bseller.com.br)
 *
 * @author    Tiago Sampaio <tiago.sampaio@e-smart.com.br>
 */

namespace SkyHub;

use SkyHub\Api\Handlers\Getters as HandlerGetters;
use SkyHub\Api\Service;
use SkyHub\Api\ServiceInterface;
use SkyHub\Api\ServiceJson;

class Api implements ApiInterface
{
    
    use HandlerGetters;
    
    
    /** @var Service */
    protected $_service = null;
    
    
    /**
     * Api constructor.
     *
     * @param string $baseUri
     * @param string $email
     * @param string $apiKey
     * @param string $apiToken
     * @param ServiceInterface $apiService
     */
    public function __construct($baseUri, $email, $apiKey, $apiToken, ServiceInterface $apiService = null)
    {
        $headers = [
            'X-User-Email'         => $email,
            'X-Api-Key'            => $apiKey,
            'X-Accountmanager-Key' => $apiToken,
            'Accept'               => 'application/json',
            'Content-Type'         => 'application/json',
        ];
        
        if (empty($apiServiceClass)) {
            $this->_service = new ServiceJson($baseUri, $headers);
            
            return;
        }
        
        $this->_service = $apiService;
    }
    
    
    /**
     * @return bool
     */
    public function checkService()
    {
        return $this->service()
                    ->checkService();
    }
    
    
    /**
     * Gets a single connection instance.
     *
     * @return Service
     */
    public function service()
    {
        return $this->_service;
    }
    
}
