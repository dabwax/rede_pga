<div class="exercises form large-10 medium-9 columns">
    <a href="<?php echo $this->Url->build(['action' => 'index']); ?>" class="btn btn-default">Listar Exercícios</a>
    <?= $this->Form->create($exercise, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Adicionar Exercício') ?></legend>
        <?php
            echo $this->Form->input('lesson_id', ['options' => $lessons, 'label' => 'Aula', 'class' => 'form-control']);
            echo $this->Form->input('due_to', ['label' => 'Para Quando', 'class' => 'form-control datepicker', 'type' => 'text']);
            echo $this->Form->input('theme_id', ['options' => $themes, 'label' => 'Matéria', 'class' => 'form-control']);
            echo $this->Form->input('name', ['label' => 'Questão', 'class' => 'form-control']);
            echo $this->Form->input('observation', ['label' => 'Observação', 'class' => 'form-control']);
            echo $this->Form->input('attachment', ['label' => 'Anexo', 'class' => 'form-control', 'type' => 'file']);
        ?>

        <?= $this->Html->image("/uploads/" . $exercise->attachment, ['class' => 'img-circle', 'style' => 'width: 180px; height: 180px;']) ?>
    </fieldset>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-floppy-o"></i> Salvar</button>
    </div>
    <?= $this->Form->end() ?>
</div>
