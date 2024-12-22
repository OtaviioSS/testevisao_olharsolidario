<?php

namespace src\config;

use PDO;

use PDOException;

use Dotenv\Dotenv;

class Connection {
    private static $pdo = null;

    public static function getConnection() {
        if (self::$pdo === null) {
            // Verifica o ambiente atual (padrão: desenvolvimento)
            $appEnv = getenv('APP_ENV') ?: 'development';

            // Define o nome do arquivo com base no ambiente
            $dotenvFile = ".env.$appEnv";

            // Caminho do diretório que contém o arquivo .env
            $dotenvPath = dirname(__DIR__, 2);

            // Verifica se o arquivo existe
            if (!file_exists($dotenvPath . '/' . $dotenvFile)) {
                die("O arquivo de ambiente ($dotenvFile) não foi encontrado no caminho: $dotenvPath");
            }

            // Carrega o arquivo de ambiente correto
            $dotenv = Dotenv::createImmutable($dotenvPath, $dotenvFile);
            $dotenv->load();

            // Configurar conexão
            $dsn = "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_DATABASE']};port={$_ENV['DB_PORT']}";
            $username = $_ENV['DB_USERNAME'];
            $password = $_ENV['DB_PASSWORD'];

            try {
                self::$pdo = new PDO($dsn, $username, $password);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erro ao conectar: " . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}
