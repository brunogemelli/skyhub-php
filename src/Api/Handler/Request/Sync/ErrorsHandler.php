<?php

namespace SkyHub\Api\Handler\Request\Sync;

use SkyHub\Api\Handler\Request\HandlerAbstract;

class ErrorsHandler extends HandlerAbstract
{

    /** @var string */
    protected $baseUrlPath = '/sync_errors';


    /**
     * @return \SkyHub\Api\Handler\Response\HandlerInterface
     */
    public function categoriesErrors()
    {
        /** @var \SkyHub\Api\Handler\Response\HandlerInterface $responseHandler */
        $responseHandler = $this->service()->get($this->baseUrlPath('categories'));
        return $responseHandler;
    }


    /**
     * @param string $categoryCode
     *
     * @return \SkyHub\Api\Handler\Response\HandlerInterface
     */
    public function categoryErrors($categoryCode)
    {
        /** @var \SkyHub\Api\Handler\Response\HandlerInterface $responseHandler */
        $responseHandler = $this->service()->get($this->baseUrlPath("categories/{$categoryCode}"));
        return $responseHandler;
    }


    /**
     * @return \SkyHub\Api\Handler\Response\HandlerInterface
     */
    public function productsErrors()
    {
        /** @var \SkyHub\Api\Handler\Response\HandlerInterface $responseHandler */
        $responseHandler = $this->service()->get($this->baseUrlPath('products'));
        return $responseHandler;
    }


    /**
     * @return \SkyHub\Api\Handler\Response\HandlerInterface
     */
    public function ordersErrors()
    {
        /** @var \SkyHub\Api\Handler\Response\HandlerInterface $responseHandler */
        $responseHandler = $this->service()->get($this->baseUrlPath('orders'));
        return $responseHandler;
    }


    /**
     * @todo It needs to be wrapped up.
     *
     * @var array $errors
     *
     * @return \SkyHub\Api\Handler\Response\HandlerInterface
     */
    public function ignoreProductErrors(
        array $errors = [
            ['entity_id' => null, 'error_category_code' => null, 'error_code' => null]
        ]
    )
    {
        /** @var \SkyHub\Api\Handler\Response\HandlerInterface $responseHandler */
        $responseHandler = $this->service()->patch($this->baseUrlPath('products'));
        return $responseHandler;
    }


    /**
     * @todo It needs to be wrapped up.
     *
     * @var array $errors
     *
     * @return \SkyHub\Api\Handler\Response\HandlerInterface
     */
    public function ignoreOrderErrors(
        array $errors = [
            ['entity_id' => null, 'error_category_code' => null, 'error_code' => null]
        ]
    )
    {
        /** @var \SkyHub\Api\Handler\Response\HandlerInterface $responseHandler */
        $responseHandler = $this->service()->patch($this->baseUrlPath('orders'));
        return $responseHandler;
    }

}
