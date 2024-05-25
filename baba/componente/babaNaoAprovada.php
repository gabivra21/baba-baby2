<div class="content">
    <div class="sidebar">
        <a href="menuBaba.php" class="sidebar-nav active"><i class="icon fa-solid
                    fa-house" style="color: #000000;"></i><span>Início</span></a>
        <a href="login/sair.php" class="sidebar-nav"><i class="icon fa-solid 
                    fa-right-from-bracket" style="color: #e90c0c;"></i><span>Sair</span></a>
    </div>

    <div class="containerDocumento">
        <div class="msgAlerta">
            <span>Você ainda não enviou seu documento para análise.</span>
            <img width="100px"
                src="https://cdn.dribbble.com/users/251873/screenshots/9288094/13539-sign-for-error-or-explanation-alert.gif"
                alt="">
        </div>
        <div class="containerInputDoc">
            <form action="baba/componente/backend/enviaDocumentoBaba.php" enctype="multipart/form-data" method="post">
                <input hidden type="text" name="idUsuario" value="<?=$_SESSION['idUsuario']?>">
                <label class="inputDocumento" for="inputDocBaba" tabIndex="0">
                    <input type="file" accept="image/*" name="foto" id="inputDocBaba" class="inputImg">
                    <span class="viewImg"></span>
                </label>
                <input type="submit" id="btnEnviar" value="Enviar Documento">
            </form>
        </div>
    </div>
</div>