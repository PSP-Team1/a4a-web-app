<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class CorsMiddleware implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $response = service('response');
        $origin = $request->getServer('HTTP_ORIGIN') ?? '*';

        $response->setHeader('Access-Control-Allow-Origin', $origin)
            ->setHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization, api-key')
            ->setHeader('Access-Control-Allow-Methods', 'GET')
            ->setHeader('Access-Control-Allow-Credentials', 'true');

        return $request;
    }



    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
