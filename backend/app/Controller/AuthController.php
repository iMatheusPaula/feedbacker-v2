<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace App\Controller;

use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;
use App\Model\User;
use App\Request\LoginRequest;
use App\Request\UserStoreRequest;
use Exception;
use Hyperf\Contract\SessionInterface;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServer\Annotation\Middleware;
use Hyperf\HttpServer\Annotation\PostMapping;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Psr\Http\Message\ResponseInterface as Psr7ResponseInterface;

#[Controller(prefix: 'auth')]
class AuthController extends AbstractController
{
    #[Inject]
    private SessionInterface $session;

    #[PostMapping(path: '/login')]
    public function login(LoginRequest $request, ResponseInterface $response): Psr7ResponseInterface
    {
        try {
            $data = $request->validated();

            $user = User::where('email', $data['email'])->first();

            if (!$user || !password_verify($data['password'], $user->password)) {
                return $response->json(['message' => 'Invalid credentials']);
            }

            $this->session->set('user_id', $user->id);

            return $response->json(['message' => 'Login successful']);
        } catch (Exception $e) {
            return $response->json(['error' => $e->getMessage()])->withStatus(500);
        }
    }

    #[PostMapping(path: '/logout')]
    #[Middleware(AuthMiddleware::class)]
    public function logout(ResponseInterface $response): Psr7ResponseInterface
    {
        try {
            $this->session->clear();

            return $response->json(['message' => 'Logout successful']);
        } catch (Exception $e) {
            return $response->json(['error' => $e->getMessage()])->withStatus(500);
        }
    }

    #[Middleware(AuthMiddleware::class)]
    #[GetMapping(path: '/me')]
    public function me(ResponseInterface $response): Psr7ResponseInterface
    {
        try {
            $userId = $this->session->get('user_id');

            $user = User::find($userId);

            return $response->json($user);
        } catch (Exception $e) {
            return $response->json(['error' => $e->getMessage()])->withStatus(500);
        }
    }

    #[Middleware(GuestMiddleware::class)]
    #[PostMapping(path: '/register')]
    public function register(UserStoreRequest $request, ResponseInterface $response): Psr7ResponseInterface
    {
        try {
            $data = $request->validated();
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

            $user = User::create($data);

            return $response->json(['message' => 'User registered successfully', 'user' => $user])->withStatus(201);
        } catch (Exception $e) {
            return $response->json(['error' => $e->getMessage()])->withStatus(500);
        }
    }
}
