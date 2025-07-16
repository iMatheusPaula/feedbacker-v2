<?php

declare(strict_types=1);

namespace App\Middleware;

use Hyperf\Contract\SessionInterface;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Contract\ResponseInterface as HttpResponse;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class GuestMiddleware implements MiddlewareInterface
{
    #[Inject]
    protected ContainerInterface $container;

    #[Inject]
    protected HttpResponse $response;

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $session = $this->container->get(SessionInterface::class);

        if ($session->has('user_id')) {
            return $this->response->json(['message' => 'Already authenticated'])->withStatus(403);
        }

        return $handler->handle($request);
    }
}
