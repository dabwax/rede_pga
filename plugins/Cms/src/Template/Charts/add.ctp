<div class="charts form large-10 medium-9 columns">
    <?= $this->Form->create($chart) ?>
    <fieldset>
        <legend><?= __('Adicionar Gráfico') ?></legend>
        <?php
            echo $this->Form->input('name', ['label' => 'Nome', 'class' => 'form-control']);
            echo $this->Form->input('use_media', ['label' => 'Usar média?', 'type' => 'checkbox', 'class' => 'form-control']);
            echo $this->Form->input('to_user', ['label' => 'É para aparecer SOMENTE para o aluno?', 'type' => 'checkbox', 'class' => 'form-control']);
            echo $this->Form->input('type', ['label' => 'Tipo', 'class' => 'form-control', 'options' => ['line' => 'Linha', 'bar' => 'Barra', 'donut' => 'Donut', 'radar' => 'Radar', 'pie' => 'Pizza', 'column' => 'Coluna', 'numero_absoluto' => 'Número Absoluto'] ]);
            echo $this->Form->input('user_id', ['options' => $users, 'label' => 'Estudante', 'class' => 'form-control', 'type' => 'hidden']);
            echo $this->Form->input("themes", ['options' => $themes, 'multiple' => true, 'label' => 'Matérias (opcional)', 'class' => 'form-control', 'select-two'] );
        ?>

    </fieldset>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-floppy-o"></i> Salvar</button>
    </div>
    <?= $this->Form->end() ?>
</div>
