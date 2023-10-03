<?php if ($level == 3) : ?>
  <nav class="menu-lateral">
    <ul>
      <li class="item-menu">
        <a href="index.php">
          <span class="icon"><i class="bi bi-house"></i></span>
          <span class="txt-link">HOME</span>
        </a>
      </li>

      <?php
      if ($level == 3) {
        include('menuLateral/itemPedidos.php');
        include('menuLateral/itemCadastro.php');
        include('menuLateral/itemRel.php');
        include('menuLateral/itemEstoque.php');
      } else if ($level == 2) {
        include('menuLateral/itemPedidos.php');
        include('menuLateral/itemCadastro.php');
      } else if ($level == 1) {
        include('menuLateral/itemPedidos.php');
      }
      ?>

      <li class="item-menu">
        <a href="logout.php">
          <span class="icon"><i class="bi bi-box-arrow-right"></i></span>
          <span class="txt-link">Sair</span>
        </a>
      </li>
    </ul>
  </nav>
<?php elseif ($level == 2) : ?>
  <nav class="menu-lateral2">
    <ul>
      <li class="item-menu">
        <a href="index.php">
          <span class="icon"><i class="bi bi-house"></i></span>
          <span class="txt-link">HOME</span>
        </a>
      </li>
      <?php
      if ($level == 3) {
        include('menuLateral/itemPedidos.php');
        include('menuLateral/itemCadastro.php');
        include('menuLateral/itemRel.php');
        include('menuLateral/itemEstoque.php');
      } else if ($level == 2) {
        include('menuLateral/itemPedidos.php');
        include('menuLateral/itemCadastro.php');
      } else if ($level == 1) {
        include('menuLateral/itemPedidos.php');
      };
      ?>
    </ul>
  </nav>

<?php elseif ($level == 1) : ?>
  <nav class="menu-lateral1">
    <ul>
      <?php
      if ($level == 3) {
        include('menuLateral/itemPedidos.php');
        include('menuLateral/itemCadastro.php');
        include('menuLateral/itemRel.php');
        include('menuLateral/itemEstoque.php');
      } else if ($level == 2) {
        include('menuLateral/itemPedidos.php');
        include('menuLateral/itemCadastro.php');
      } else if ($level == 1) {
        include('menuLateral/itemPedidos.php');
      };
      ?>
    </ul>
  </nav>

<?php endif; ?>