<script src="javascript/scriptshome.js"></script>
<body>
    <div class="resultadoPesquisa_back"><i><img src="imagens/logotipo/artifex2.png"></i></div><!--SIMBOLO ARTIFEX -->
    <!-- Aparecer criacao de post(includes) -->

    <div class="casa_main" id="casa_main">
        <div class="casa_create_post" id="casa_create_post">
            <p>Crie o seu post aqui</p>
            <i class="far fa-plus-square"></i>
        </div>
        <!--SEPARADOR DO CRIAR POST E DOS POSTS CRIADOS-->
        <div class="casa_main_seperator"></div>

        <!--CRIACAO DOS POSTS-->
        <?php getHome($_SESSION['UtilID']) ?>






    </div><!--FINAL DA DIV MAIN DO BODY HOME-->
</body>
