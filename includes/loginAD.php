<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header text-center">
                <h4 class="auth-header">Entre com seu usuário e senha do AD</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="loginAD.php">
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="col-md-3 label-control" for="login">Usuário</label>
                            <div class="col-md-9">
                                <div class="position-relative has-icon-left">
                                    <input type="text" name="login" class="form-control" placeholder="Usuário" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 label-control" for="senha">Senha</label>
                            <div class="col-md-9">
                                <div class="position-relative has-icon-left">
                                    <input type="password" name="senha"class="form-control" placeholder="Senha" required>
                                    <div class="form-control-position">
                                        <i class="fa fa-briefcase"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="buttons-w">
                            <button type="submit" value="Entrar" class="btn btn-primary">Entrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-md-3"></div>
</div>