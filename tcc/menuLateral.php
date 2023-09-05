<?php

echo '
<nav class="menu-lateral">
<ul>
    <li class="item-menu">
        <a href="index.php">
            <span class="icon"><i class="bi bi-house"></i></span>
            <span class="txt-link">HOME</span>
        </a>
    </li>';

        if($level==3){
            include ('menuLateral/itemPedidos.php');
            include ('menuLateral/itemCadastro.php');
            include ('menuLateral/itemRel.php');
            include ('menuLateral/itemEstoque.php');

        }else if($level==2){
            include ('menuLateral/itemPedidos.php');
            include ('menuLateral/itemCadastro.php');

        }else if ($level==1){
            include ('menuLateral/itemPedidos.php');

        };
    
'</ul>
</nav>';
    
    

?>