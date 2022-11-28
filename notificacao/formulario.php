<section class="my-4">
        <form action="notificar.php" method="POST">

            <div class="col">
                <label for="descricao">Notificação</label>
                <div class="form-group">
                    <textarea name="descricao" id="" cols="120" rows="5" required></textarea>
                </div>
            </div>
            <div class="row my-1">
                <div class="col">
                    <label>Curso</label>
                    <select name="curso" class="form-control">
                        <option value="">Selecione o Curso</option>
                        <option value="Técnico em Administração - Integrada" <?= $curso == 'Técnico em Administração - Integrada' ? 'selected' : '' ?>>Técnico em Administração - Integrada</option>
                        <option value="Técnico em Informática para Internet - Integrada" <?= $curso == 'Técnico em Informática para Internet - Integrada' ? 'selected' : '' ?>>Técnico em Informática para Internet - Integrada</option>
                        <option value="Técnico em Meio Ambiente - Integrada" <?= $curso == 'Técnico em Meio Ambiente - Integrada' ? 'selected' : '' ?>>Técnico em Meio Ambiente - Integrada</option>
                        <option value="Técnico em Informática (subsequente)" <?= $curso == 'Técnico em Informática (subsequente)' ? 'selected' : '' ?>>Técnico em Informática (subsequente)</option>
                        <option value="Técnico em Vendas (subsequente)" <?= $curso == 'Técnico em Vendas (subsequente)' ? 'selected' : '' ?>>Técnico em Vendas (subsequente)</option>
                        <option value="Tecnologia em Logística (superior)" <?= $curso == 'Tecnologia em Logística (superior)' ? 'selected' : '' ?>>Tecnologia em Logística (superior)</option>
                        <option value="Pedagogia (Superior)" <?= $curso == 'Pedagogia (Superior)' ? 'selected' : '' ?>>Pedagogia (Superior)</option>
                        <option value="Licenciatura em Computação (superior)" <?= $curso == 'Licenciatura em Computação (superior)' ? 'selected' : '' ?>>Licenciatura em Computação (superior)</option>
                        <option value="Sistemas de Informação (Superior)" <?= $curso == 'Sistemas de Informação (Superior)' ? 'selected' : '' ?>>Sistemas de Informação (Superior)</option>
                        <option value="FIC/Proeja Assistente Administrativo" <?= $curso == 'FIC/Proeja Assistente Administrativo' ? 'selected' : '' ?>>FIC/Proeja Assistente Administrativo</option>
                    </select>
                </div>
                <div class="col">
                    <label>Periodo</label>
                    <select name="periodo" class="form-control">
                        <option value="">Selecione o Periodo</option>
                        <option value="1" <?= $periodo == '1' ? 'selected' : '' ?>>1º</option>
                        <option value="2" <?= $periodo == '2' ? 'selected' : '' ?>>2º</option>
                        <option value="3" <?= $periodo == '3' ? 'selected' : '' ?>>3º</option>
                        <option value="4" <?= $periodo == '4' ? 'selected' : '' ?>>4º</option>
                        <option value="5" <?= $periodo == '5' ? 'selected' : '' ?>>5º</option>
                        <option value="6" <?= $periodo == '6' ? 'selected' : '' ?>>6º</option>
                        <option value="7" <?= $periodo == '7' ? 'selected' : '' ?>>7º</option>
                        <option value="8" <?= $periodo == '8' ? 'selected' : '' ?>>8º</option>
                    </select>
                </div>


                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-success">Notificar Todos</button>

                </div>
            </div>
        
            <div class="row my-1">
                <div class="col">
                    <label>Aluno</label>
                    <select name="aluno_id" class="form-control">
                        <option value="">Selecione o Aluno</option>
                        <?php
                        include('../includes/select-aluno.php');
                        ?>
                    </select>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-success">Notificar o Aluno</button>
                </div>
            </div>
        </form>
    </section>
