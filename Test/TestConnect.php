<?php
use PHPUnit\Framework\TestCase;

class DatabaseConnectionTest extends TestCase
{
    private $conn;

    protected function setUp(): void
    {
        $host = 'localhost';
        $dbname = 'user_auth';
        $username = 'root';
        $password = '';

        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $this->fail("Connection failed: " . $e->getMessage());
        }
    }

    public function testDatabaseConnection()
    {
        $this->assertInstanceOf(PDO::class, $this->conn);
        
        // Проверяем, что можем выполнить простой запрос
        $result = $this->conn->query("SELECT 1")->fetchColumn();
        $this->assertEquals(1, $result);
    }

    public function testUsersTableExists()
    {
        $stmt = $this->conn->query("SHOW TABLES LIKE 'users'");
        $this->assertEquals(1, $stmt->rowCount());
    }

    protected function tearDown(): void
    {
        $this->conn = null;
    }
}