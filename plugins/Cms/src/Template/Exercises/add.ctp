<div class="exercises form large-10 medium-9 columns">
    <a href="<?php echo $this->Url->build(['action' => 'index']); ?>" class="btn btn-default">Listar Exercícios</a>
    <?= $this->Form->create($exercise, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Adicionar Exercício') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users, 'label' => 'Estudante', 'class' => 'form-control', 'type' => 'hidden']);
            echo $this->Form->input('lesson_id', ['options' => $lessons, 'label' => 'Aula (opcional)', 'class' => 'form-control', 'empty' => 'Selecionar']);
            echo $this->Form->input('due_to', ['label' => 'Para Quando', 'class' => 'form-control datepicker', 'type' => 'text', 'datepicker']);
            echo $this->Form->input('theme_id', ['options' => $themes, 'label' => 'Matéria', 'class' => 'form-control']);
            echo $this->Form->input('name', ['label' => 'Questão', 'class' => 'form-control']);
            echo $this->Form->input('observation', ['label' => 'Observação', 'class' => 'form-control']);
            echo $this->Form->input('attachment', ['label' => 'Anexo', 'class' => 'form-control', 'type' => 'file']);
        ?>
    </fieldset>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-floppy-o"></i> Salvar</button>
    </div>
    <?= $this->Form->end() ?>
</div>
