<?php

/**
 * This file defines the Api Response in the Bundle HCHDemoBundle for the REST API
 *
 * @category HCHDemoBundle
 * @package ApiResponse
 * @author HCH <chaabani.hammadi@gmail.com>
 * @copyright 2016-2017 HCH
 * @version 1.0.0
 * @since File available since Release 1.0.0
 */
namespace HCH\DemoBundle\ApiResponse;

use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\SerializationContext;
use Symfony\Component\HttpFoundation\Response;
use JMS\Serializer\SerializerBuilder;

/**
 * Class ApiResponse for API services
 *
 * @category HCHDemoBundle
 * @package ApiResponse
 * @author HCH <chaabani.hammadi@gmail.com>
 * @copyright 2016-2017 HCH
 * @version 1.0.0
 * @since File available since Release 1.0.0
 *
 */
class  ApiResponse extends Response
{
    const STATUS_SUCCESS = 'success';
    const STATUS_WARNING = 'warning';

    public function __construct($data = null, $code = 200,$message = null, $status = 'success')
    {
        $content = array();
        $content['message'] = $message;
        $content['status'] = $status;
        $content['code'] = $code;
        $content['data'] = $data;
        $context = new SerializationContext();
        $context->setSerializeNull(true);
        $serializer = SerializerBuilder::create()
            ->setPropertyNamingStrategy(new SerializedNameAnnotationStrategy(new IdenticalPropertyNamingStrategy()))
            ->build();
        $jsonContent = $serializer->serialize($content, 'json', $context);
        parent::__construct($jsonContent);
        $this->setStatusCode(intval(substr($code, 0, 3)));

    }
}
