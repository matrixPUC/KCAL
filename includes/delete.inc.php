<span class="material-icons">delete</span>
<form id="delete-form" method="POST" action="./deletePHP.php">
    <strong><a href="#" onclick="openModal()">Deletar conta</a></strong>
    <div id="delete-modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <p>Tem certeza que deseja excluir sua conta?</p>
            <button type="submit">Sim</button>
            <button type="button" onclick="closeModal()">Cancelar</button>
        </div>
    </div>
</form>