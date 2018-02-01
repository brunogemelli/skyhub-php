<?php

namespace SkyHub\Api\Handler\Request;

use SkyHub\Api\DataTransformer\DataTransformerInterface;
use SkyHub\Api\Service\ServiceInterface;
use SkyHub\ApiInterface;

/**
 * BSeller Platform | B2W - Companhia Digital
 *
 * Do not edit this file if you want to update this module for future new versions.
 *
 * @category  SkuHub
 * @package   SkuHub
 *
 * @copyright Copyright (c) 2018 B2W Digital - BSeller Platform. (http://www.bseller.com.br).
 *
 * @author    Tiago Sampaio <tiago.sampaio@e-smart.com.br>
 */
abstract class HandlerAbstract implements HandlerInterface
{
    
    /** @var ApiInterface */
    private $api;
    
    /** @var DataTransformerInterface */
    protected $transformer = null;
    
    /** @var string */
    protected $transformerClass = null;

    /** @var string */
    protected $baseUrlPath = null;
    
    
    /**
     * AbstractHandler constructor.
     *
     * @param ApiInterface $api
     */
    public function __construct(ApiInterface $api)
    {
        $this->api = $api;
    }
    
    
    /**
     * @return DataTransformerInterface
     */
    protected function transformer()
    {
        if (empty($this->transformerClass)) {
            $this->transformer = new $this->transformerClass();
        }
        
        return $this->transformer;
    }
    
    
    /**
     * @return ApiInterface
     */
    protected function api()
    {
        return $this->api;
    }


    /**
     * @return ServiceInterface
     */
    protected function service()
    {
        return $this->api->service();
    }


    /**
     * @param string $suffix
     * @param array  $query
     *
     * @return string
     */
    protected function baseUrlPath($suffix = null, array $query = [])
    {
        /** @var string $baseUrlPath */
        $baseUrlPath = $this->baseUrlPath;

        if (!empty($suffix)) {
            $suffix = ltrim($suffix, "\/");
            $baseUrlPath .= '/' . trim($suffix);
        }

        if (!empty($query)) {
            $queryString  = http_build_query($query);
            $baseUrlPath .= '?' . $queryString;
        }

        return $baseUrlPath;
    }
}
