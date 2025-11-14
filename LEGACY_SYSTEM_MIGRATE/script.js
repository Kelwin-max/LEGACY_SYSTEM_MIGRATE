document.addEventListener('DOMContentLoaded', () => {
    const registrationForm = document.getElementById('registrationForm');
    const messageDisplay = document.getElementById('message');
    const userTableBody = document.querySelector('#userTable tbody');

    // Endpoint do PHP para lidar com o registro e listar usuários
    const backendEndpoint = '../server/handle_user_data.php';

    // Função para carregar e exibir a lista de usuários
    async function loadUsers() {
        try {
            const response = await fetch(`${backendEndpoint}?action=read`);
            const users = await response.json();
            
            userTableBody.innerHTML = ''; // Limpa a tabela
            
            if (users.length === 0) {
                userTableBody.innerHTML = '<tr><td colspan="3" style="text-align: center; color: var(--color-accent-magenta);">DATABASE EMPTY // NO RECORDS FOUND</td></tr>';
                return;
            }

            users.forEach(user => {
                const row = userTableBody.insertRow();
                row.insertCell().textContent = user.id;
                row.insertCell().textContent = user.username;
                row.insertCell().textContent = user.email;
            });

        } catch (error) {
            console.error('ERROR: Could not fetch user data.', error);
            messageDisplay.textContent = 'ERROR: Falha na comunicação com o servidor (READ).';
        }
    }

    // Função para lidar com o envio do formulário de registro
    registrationForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        messageDisplay.textContent = 'TRANSMITTING DATA...';

        const formData = new FormData(registrationForm);
        formData.append('action', 'create');

        try {
            const response = await fetch(backendEndpoint, {
                method: 'POST',
                body: formData,
            });
            const result = await response.json();

            if (result.success) {
                messageDisplay.textContent = `SUCCESS: User ${formData.get('username')} registered (ID: ${result.id}).`;
                registrationForm.reset();
                loadUsers(); // Recarrega a lista após o registro
            } else {
                messageDisplay.textContent = `ERROR: Registration failed - ${result.message || 'Unknown error.'}`;
            }

        } catch (error) {
            console.error('ERROR: Could not submit registration.', error);
            messageDisplay.textContent = 'ERROR: Falha na comunicação com o servidor (CREATE).';
        }
    });

    // Inicia o carregamento dos usuários ao abrir a página
    loadUsers();
});