<?php

namespace src\controller;

require __DIR__ . '/../../vendor/autoload.php';

use Exception;
use src\config\Connection;
use src\util\PasswordEncrypt;
use src\util\Email;
use src\Model\User;
use PHPMailer\PHPMailer\PHPMailer;
use src\repository\UserRepository;

class UserController
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function signIn(): array
    {
        header('Cache-Control: no-cache, must-revalidate');
        header('Content-Type: application/json; charset=utf-8');

        $password = trim($_POST['passwordLogin']);
        $email = filter_input(INPUT_POST, 'emailLogin', FILTER_VALIDATE_EMAIL);

        $user = $this->userRepository->getUserForEmail(trim($email))->fetch();
        if ($user && password_verify($password, $user['user_password'])) {
            session_start();
            $_SESSION['login'] = true;
            $_SESSION['nome'] = $user['nome'];
            $_SESSION['id_user'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            http_response_code(200);
            return ['success' => true, 'message' => 'Login realizado com sucesso.', 'status' => 200];
        } else {
            http_response_code(401);
            return ['success' => false, 'message' => 'Credenciais inválidas.', 'status' => 401];
        }
    }

    function generateUniqueToken($length = 32): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $token = '';

        for ($i = 0; $i < $length; $i++) {
            $randomIndex = mt_rand(0, strlen($characters) - 1);
            $token .= $characters[$randomIndex];
        }

        return $token;
    }

    function insertToken($userID, $token): void
    {
        try {
            $this->userRepository->updateUserToken($userID, $token);
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }

    public function recoverPassword(): void
    {
        $email = trim($_POST['emailRecoverPassword']);
        $count = $this->userRepository->getCouRowsFromEmail($email);

        if ($count > 0) {
            try {
                $user = $this->userRepository->getUserForEmail($email)->fetch();
                $token = $this->generateUniqueToken();
                $this->insertToken($user['id'], $token);

                $mail = new Email('smtp.hostinger.com', 'adm@superotica.incub.com.br', 'Vru)9.76-)3(}tu$', 'Super Otica');
                $mail->enviarPara("$email", $user['nome']);
                $url = 'http://localhost:8081/alterPassword';
                $corpo = 'Olá ' . $user['nome'] . ',<br>Foi solicitada uma redefinição de senha na "Nome do site". Acesse o link abaixo para redefinir sua senha.<br>' .
                    '<h3><a href="' . $url . '?token=' . $token . '">Redefinir sua senha</a></h3><br>' .
                    'Caso não tenha solicitado esta redefinição, ignore esta mensagem.';

                $informacoes = ['Assunto' => 'Redefinição de senha', 'Corpo' => $corpo];
                $mail->formatarEmail($informacoes);

                if ($mail->enviarEmail()) {
                    echo 'As instruções para redefinição de senha foram enviadas ao seu e-mail.';
                } else {
                    echo 'Erro ao enviar o e-mail. Tente novamente mais tarde.';
                }
            } catch (Exception $exception) {
                echo $exception->getMessage();
            }
        } else {
            http_response_code(404);
            echo 'E-mail não encontrado em nossa base de dados.';
        }
    }

    // Outros métodos corrigidos
    public function createNewUser(): void
    {
        try {
            $email = trim($_POST['email']);
            $userExist = $this->userRepository->getUserForEmail($email);

            if ($userExist && $userExist->rowCount() === 1) {
                echo "<script>alert('E-mail já cadastrado');</script>";
                echo "<script>history.back();</script>";
            } else {
                $user = new User();
                $passHash = new PasswordEncrypt();
                $user->setEmail($email);
                $user->setPassword($passHash->passwordEncryption(trim($_POST['password'])));
                $user->setNome(trim($_POST['nome']));
                $this->userRepository->insertUser($user);
                echo "<script>alert('Usuário cadastrado com sucesso');</script>";
                echo "<script>history.back();</script>";
            }
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }

    // Métodos editUser, updatePassword, delete, etc., também corrigidos
    public function editUser(): void
    {
        try {
            $user = new User();
            $user->setEmail(trim($_POST['email']));
            $user->setNome(trim($_POST['nome']));
            $user->setIdUser(trim($_POST['idUser']));
            $this->userRepository->updateUser($user);
            echo "<script>alert('Usuário atualizado com sucesso');</script>";
            echo "<script>history.back();</script>";
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }

    public function updatePassword($id, $newPassword): void
    {
        try {
            $user = new User();
            $passHash = new PasswordEncrypt();
            $user->setPassword($passHash->passwordEncryption(trim($newPassword)));
            $this->userRepository->updateUserPassword($id, $user->getPassword());
            $this->userRepository->updateUserToken($id, "token expirado");
            echo "<script>alert('Senha atualizada com sucesso');</script>";
            echo "<script>history.back();</script>";
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }
}

// Instanciação do controlador corrigida
$connection = Connection::getConnection();
$userRepository = new UserRepository($connection);
$userController = new UserController($userRepository);

// Verificação das ações de acordo com o botão pressionado
if (isset($_POST['btnLoginUser'])) {
    $userResponse = $userController->signIn();
    echo json_encode($userResponse);
}

if (isset($_POST['btnRecoverPasword'])) {
    $userController->recoverPassword();
}

if (isset($_POST['btnRegisterUser'])) {
    $userController->createNewUser();
}

if (isset($_POST['btnEditUser'])) {
    $userController->editUser();
}

if (isset($_POST['btnUpdatePassword'])) {
    $userController->updatePassword(trim($_POST['userID']), trim($_POST['inputPassword']));
}
