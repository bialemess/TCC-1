
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fazer Pedido</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/cadastrar_pedido.css">
    <link rel="stylesheet" href="menuLateral/menu_lateral.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php $level = 3; require "menuLateral/index.php"; ?>

    <div class="container mt-5">
        <h1>Fazer Pedido</h1>

        <!-- Formulário de informações do cliente e pedido -->
        <form id="order-form">

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="customer-name">Nome do Cliente:</label>
                    <input type="text" class="form-control" id="customer-name" required>
                    <div id="name-message" class="field-message"></div>
                </div>
                <div class="form-group col-md-4">
                    <label for="custumer-email" class="form-label">Email </label>
                    <input type="email" class="form-control" id="custumer-email" placeholder="nome@dominio.com"
                        required>
                    <div id="email-message" class="field-message"></div>
                </div>
                <div class="form-group col-md-4">
                    <label for="order-date" class="form-label">Data do Pedido:</label>
                    <input type="text" class="form-control" id="order-date" readonly>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="destination" class="form-label">Destino:</label>
                    <input type="text" class="form-control" id="destination" required>
                    <div id="destination-message" class="field-message"></div>
                </div>

                <div class="form-group col-md-4">
                    <label for="op" class="form-label">OP (Código):</label>
                    <input type="text" class="form-control" id="op" required>
                    <div id="op-message" class="field-message"></div>
                </div>

                <div class="form-group col-md-4">
                    <label for="details" class="form-label">Detalhes:</label>
                    <!-- deixa o campo de texto menor-->
                    <textarea class="form-control" id="details" rows="1" required></textarea>
                    <div id="details-message" class="field-message"></div>
                </div>
            </div>

            <button type="button" class="btn btn-primary" onclick="addProductForm()">Adicionar Produto</button>
            <button type="submit" class="btn btn-success">Enviar Pedido</button>

        </form>

        <!-- Formulário de adicionar produto -->
        <form id="product-form" style="display: none;">
            <div class="mb-3">
                <label for="product-name" class="form-label">Nome do Produto:</label>
                <input type="text" class="form-control" id="product-name" required>
                <div id="product-name-message" class="field-message"></div>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantidade:</label>
                <input type="number" class="form-control" id="quantity" min="1" required>
                <div id="quantity-message" class="field-message"></div>
            </div>
            <button type="submit" class="btn btn-success" onclick="addProduct()">Adicionar</button>
            <button type="button" class="btn btn-danger" onclick="cancelAddProduct()">Cancelar</button>
        </form>

        <!-- Lista de produtos adicionados -->
        <ul class="item-list" id="product-list"></ul>

        <div id="alert-message" class="success-message" style="display: none;"></div>

        <script>
            // Adiciona a data atual ao campo "Data do Pedido"
            document.getElementById('order-date').value = getCurrentDate();

            const form = document.getElementById('order-form');

            form.addEventListener("submit", function (event) {
                event.preventDefault();

                if (validateForm()) {
                    displayAlert('enviou', 'error');
                    submitOrder();
                } else {
                    displayAlert('nao enviou', 'error');
                    displayAlert('Preencha todos os campos.', 'error');
                }
            });

            function getCurrentDate() {
                const today = new Date();
                const day = today.getDate();
                const month = today.getMonth() + 1; // Mês é indexado de 0 a 11
                const year = today.getFullYear();

                return `${day}/${month}/${year}`;
            }

            function addProductForm() {
                document.getElementById('product-form').style.display = 'block';
            }

            function cancelAddProduct() {
                document.getElementById('product-form').style.display = 'none';
            }

            function addProduct() {
                const productName = document.getElementById('product-name').value;
                const quantity = document.getElementById('quantity').value;

                if (productName && quantity) {
                    const productList = document.getElementById('product-list');

                    const listItem = document.createElement('li');
                    listItem.classList.add('item');
                    listItem.innerHTML = `
                        <div>${productName}</div>
                        <div>Quantidade: ${quantity}</div>
                        <div class="edit-button" onclick="editProduct(this)">Editar</div>
                        <div class="remove-button" onclick="removeProduct(this)">Remover</div>
                    `;

                    productList.appendChild(listItem);

                    // Limpa os campos do formulário de adicionar produto
                    document.getElementById('product-name').value = '';
                    document.getElementById('quantity').value = '';

                    // Oculta o formulário de adicionar produto
                    cancelAddProduct();
                }
            }

            function removeProduct(button) {
                const listItem = button.parentElement;
                const productList = document.getElementById('product-list');
                productList.removeChild(listItem);
            }

            function editProduct(button) {
                const listItem = button.parentElement;
                const productName = listItem.querySelector('div:first-child').textContent;
                const quantity = listItem.querySelector('div:nth-child(2)').textContent.match(/\d+/)[0];

                // Preencha os campos do formulário de adicionar produto com os valores existentes
                document.getElementById('product-name').value = productName;
                document.getElementById('quantity').value = quantity;

                // Remova o item da lista
                const productList = document.getElementById('product-list');
                productList.removeChild(listItem);

                // Exiba o formulário de adicionar produto
                addProductForm();
            }

            // Função para enviar o pedido
          

function displayAlert(message, type) {
    Swal.fire({
        title: message,
        icon: type,
      //  timer: 3000,
        showConfirmButton: true,
        confirmButtonColor: '#28a745',
    });
}

function submitOrder() {
    // Verifica se ao menos um produto foi selecionado
    const productList = document.getElementById('product-list');
    if (productList.childElementCount === 0) {
        displayAlert('Adicione ao menos 1 produto.', 'error');
        return false;
    }

    // Envia o formulário e o pedido limpando os campos
    displayAlert('Pedido enviado com sucesso!', 'success');
    clearForm();
    return false;
}

function clearForm() {
    // Limpa os campos
    document.getElementById('customer-name').value = '';
    document.getElementById('custumer-email').value = '';

    document.getElementById('destination').value = '';
    document.getElementById('op').value = '';
    document.getElementById('details').value = '';
    document.getElementById('product-list').innerHTML = '';
}

//mika isso aqui foi 100%gepetas
            function validateForm() {
               
                const customerName = document.getElementById('customer-name').value;
                const customerEmail = document.getElementById('custumer-email').value;
                const destination = document.getElementById('destination').value;
                const op = document.getElementById('op').value;
                const details = document.getElementById('details').value;

                return customerName && customerEmail && destination && op && details;
            }

        
        </script>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.2/dist/js/bootstrap.min.js"></script>

</body>

</html>