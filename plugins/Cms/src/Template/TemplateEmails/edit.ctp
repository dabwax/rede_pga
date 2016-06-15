<div class="page-title red darken-3">
    <h2>Edição do Email "<?php echo $templateEmail->title; ?>"</h2>

    <div class="clearfix"></div>
</div> <!-- .page-title -->

<div class="templateEmails form large-9 medium-8 columns content">
    <?= $this->Form->create($templateEmail) ?>
    <fieldset>
        <?php
            echo $this->Form->input('content', ['editor', 'label' => 'Conteúdo do Email']);
        ?>

        <button type="submit" class="btn green">Salvar Template de Email</button>
    </fieldset>
    <?= $this->Form->end() ?>
</div>


<?php $this->start('custom_assets'); ?>
<?php echo $this->Html->css("/bower_components/trumbowyg/dist/ui/trumbowyg.min.css") ?>
<?php echo $this->Html->script("/bower_components/trumbowyg/dist/trumbowyg.min.js") ?>

<style>
  .trumbowyg-box, .trumbowyg-editor {
    margin: 0px !important;
  }
  .trumbowyg-editor li {
    list-style-type: disc;
  }
</style>
<?php $this->end(); ?>
