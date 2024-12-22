<?php

namespace src\util;

use Exception;
use PDO;
use src\config\Connection;
use src\controller\ClienteController;
use src\controller\UserController;
use src\repository\ClienteRepository;
use src\repository\UserRepository;

require_once 'vendor/autoload.php';

class RouteSwitch extends Connection
{

    protected PDO $connection;

    public function __construct()
    {
        $this->connection = Connection::getConnection(); // Inicialize a conexão aqui
    }

    /**
     * Redireciona para a página de login.
     */
    protected function login(): void
    {
        $this->loadView('componentes/modalRecoverPassword');
        $this->loadView('login');
    }

    /**
     * Redireciona para a página inicial.
     */
    protected function home(): void
    {
        $this->loadView('home');
    }

    /**
     * Redireciona para a página de clientes.
     */
    protected function clientes(): void
    {
        $this->ensureSessionIsActive();


        if (!$this->isUserLoggedIn()) {
            $this->redirectToLogin();
        } else {
            $this->loadView('head');
            $this->loadView('clientes');
            $this->loadView('footer');
        }
    }

    /**
     * Redireciona para a página de perfil.
     */
    protected function profile(): void
    {
        $this->ensureSessionIsActive();

        if (!$this->isUserLoggedIn()) {
            $this->redirectToLogin();
        } else {
            $userId = $_SESSION['id_user'];
            $user = $this->fetchUserById($userId);
            $this->loadView('head', ['user' => $user]);
            $this->loadView('profile', ['user' => $user]);
            $this->loadView('footer');
        }
    }

    /**
     * Redireciona para a página de criação de novo usuário.
     */
    protected function newUser(): void
    {
        $this->ensureSessionIsActive();
        $this->loadView('componentes/modalCadUsuario');
        $this->loadView('head');
        $this->loadView('newUser');
        $this->loadView('footer');
    }

    /**
     * Redireciona para a página de edição de usuário.
     */
    protected function editUser(): void
    {
        $this->ensureSessionIsActive();

        if (isset($_GET['idUser'])) {
            $connection = Connection::getConnection();
            $userRepository = new UserRepository($connection);
            $userController = new UserController($userRepository);

            $user = $userController->getUserByID(trim($_GET['idUser']))->fetch(PDO::FETCH_ASSOC);

            $this->loadView('componentes/modalCadUsuario');
            $this->loadView('head', ['user' => $user]);
            $this->loadView('editUser', ['user' => $user]);
            $this->loadView('footer');
        }
    }

    /**
     * Remove um usuário.
     */
    protected function deleteUser(): void
    {
        $this->ensureSessionIsActive();

        if (isset($_GET['idUser'])) {
            $connection = Connection::getConnection();
            $userRepository = new UserRepository($connection);
            $userController = new UserController($userRepository);

            $userController->delete(trim($_GET['idUser']));
        }
    }

    /**
     * Redireciona para a página de alteração de senha com base no token.
     */
    public function alterPassword(): void
    {
        try {
            if (!isset($_GET['token'])) {
                throw new Exception("Token não fornecido");
            }

            $token = $_GET['token'];
            $connection = Connection::getConnection();
            $userRepository = new UserRepository($connection);
            $user = $userRepository->getUserByToken($token);

            if (!$user) {
                throw new Exception("Token inválido");
            }

            $this->loadView('newPassword', ['userId' => $user['id']]);
        } catch (Exception $exception) {
            echo "Erro: " . $exception->getMessage();
        }
    }

    /**
     * Método mágico para capturar chamadas a métodos inexistentes.
     */
    public function __call($name, $arguments)
    {
        http_response_code(404);
        $this->loadView('error404');
    }

    /**
     * Carrega uma view com dados opcionais.
     */
    private function loadView(string $view, array $data = []): void
    {
        extract($data);
        require __DIR__ . "/../../view/{$view}.php";
    }

    /**
     * Garante que a sessão está ativa.
     */
    private function ensureSessionIsActive(): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    /**
     * Verifica se o usuário está logado.
     */
    private function isUserLoggedIn(): bool
    {
        return isset($_SESSION['login']) && $_SESSION['login'] === true;
    }

    /**
     * Redireciona para a página de login.
     */
    private function redirectToLogin(): void
    {
        header('Location: /login');
        exit;
    }

    /**
     * Obtém informações do usuário por ID.
     */
    private function fetchUserById(int $id): array
    {
        $connection = Connection::getConnection();
        $stmt = $connection->prepare("SELECT * FROM tb_user WHERE id = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
