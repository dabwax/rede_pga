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
