<div class="page-title red darken-3">
    <h2>Gráficos de Número Absoluto</h2>

    <div class="actions">
        <a href="<?php echo $this->Url->build(['action' => 'index']); ?>" class="waves-effect waves-light btn"><i class="material-icons left">keyboard_backspace</i> voltar</a>
    </div> <!-- .actions -->

    <div class="clearfix"></div>
</div> <!-- .page-title -->
<div class="chartAbsolutes form large-9 medium-8 columns content">
    <?= $this->Form->create($chartAbsolute) ?>
        <?php
            echo $this->Form->input('input_id', ['options' => $inputs, 'empty' => 'Selecionar', 'class' => 'browser-default', 'label' => 'Input']);
            echo $this->Form->input('type', ['options' => ['media' => 'Média', 'soma' => 'Soma'], 'empty' => 'Selecionar', 'class' => 'browser-default', 'label' => 'Tipo' ]);
            echo $this->Form->input('title', ['label' => 'Título']);
        ?>
        <button class="btn btn-primary btn-block"><i class="fa fa-floppy-o"></i> Salvar</button>
    <?= $this->Form->end() ?>
</div>
