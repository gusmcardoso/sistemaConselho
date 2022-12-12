<?php
$alertaLogin = strlen($alertaLogin) ? '<div class="alert alert-danger">' . $alertaLogin . '</div>' : '';
$alertaCadastro = strlen($alertaCadastro) ? '<div class="alert alert-danger">' . $alertaCadastro . '</div>' : '';

?>

<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
    <div class="card">
    <div class="card-header text-center">
        <h4 class="auto-header">Login</h4>
    </div>
    <div class="card-body">
    <form method="POST">

        <?=$alertaLogin?>
        <div class="form-group">
            <label  class="col-md-3 label-control">Usuário</label>
            <input type="text" name="usuario" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Senha</label>
            <input type="password" name="senha" class="form-control" required>
        </div>
        <div class="form-group">
           <button type="submit" name="acao" value="logar" class="btn btn-success">Entrar</button>
        </div>
    </form>
    </div>
    </div>
    </div>
    <div class="col-md-3"></div>
</div>

