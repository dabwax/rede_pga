<div class="page-title red darken-3">
    <h2>Abas dos Gráficos</h2>

    <div class="actions">
        <a href="<?php echo $this->Url->build(['action' => 'index']); ?>" class="waves-effect waves-light btn"><i class="material-icons left">keyboard_backspace</i> voltar</a>
    </div> <!-- .actions -->

    <div class="clearfix"></div>
</div> <!-- .page-title -->

<div class="chartTabs form large-9 medium-8 columns content">
    <?= $this->Form->create($chartTab) ?>
    <?php
        echo $this->Form->input('title', ['label' => 'Nome da Aba']);
        ?>

    <div class="input-field">
        <?php echo $this->Form->input('charts_related', ['options' => $chartsRelated, 'type' => 'select', 'label' => false, 'multiple' => true, 'templates' => [
        'inputContainer' => '{{content}}'
        ], 'materialize-select' ]); ?>
        <label>Gráficos Relacionados</label>
    </div>

    <button class="btn">Salvar Aba</button>
    <?= $this->Form->end() ?>
</div>
