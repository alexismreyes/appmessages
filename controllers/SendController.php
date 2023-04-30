<?php

namespace PHPMaker2023\appmessage;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * send controller
 */
class SendController extends ControllerBase
{
    // custom
    public function custom(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "Send");
    }
}
