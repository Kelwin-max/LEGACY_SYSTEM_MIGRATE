<?php
// server/handle_user_data.php
header('Content-Type: application/json');
require_once('../includes/db_config.php'); // Inclui a configuração e conexão do banco

$response = ['success' => false, 'message' => 'Invalid Request'];

// Determina a ação
$action = $_REQUEST['action'] ?? null;

// --- AÇÃO: CREATE (Registro de Novo Usuário) ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $action === 'create') {
    $username = $conn->real_escape_string($_POST['username'] ?? '');
    $email = $conn->real_escape_string($_POST['email'] ?? '');

    if (empty($username) || empty($email)) {
        $response['message'] = 'Missing username or email data.';
    } else {
        $stmt = $conn->prepare("INSERT INTO users (username, email) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $email);

        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = 'User successfully registered.';
            $response['id'] = $conn->insert_id;
        } else {
            // Verifica erro de duplicidade (ex: nome de usuário já existe)
            if ($conn->errno === 1062) {
                $response['message'] = 'Registration failed: Username or Email already exists.';
            } else {
                $response['message'] = 'Registration failed: ' . $stmt->error;
            }
        }
        $stmt->close();
    }
}

// --- AÇÃO: READ (Listar Todos os Usuários) ---
elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && $action === 'read') {
    $result = $conn->query("SELECT id, username, email FROM users ORDER BY id DESC");
    
    $users = [];
    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
    }
    
    // Retorna o array de usuários (mesmo que vazio)
    echo json_encode($users);
    $conn->close();
    exit; 
}

// Se chegou até aqui, retorna a resposta JSON
echo json_encode($response);
$conn->close();
?>