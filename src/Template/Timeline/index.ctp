<section id="cd-timeline" ng-controller="TimelineCtrl" data-card="<?php echo @$_GET['card']; ?>">

  <!-- Modal Structure -->
  <?php echo $this->element("../Feed/modal"); ?>

  <div class="cd-timeline-block" ng-repeat="lesson in lessons">


    <div class="cd-timeline-img" style="background: #33d1ff;">
    </div> <!-- cd-timeline-img -->

    <div class="cd-timeline-content">
      <h2>{{lesson.date_d}}/{{lesson.date_m}}/{{lesson.date_y}}</h2>

      <!-- Card Title -->
  <span class="card-title text-center"></span>

  <div class="clearfix"></div>

  <div class="card-panel small grey lighten-3" ng-if="lesson.formatted_data.length == 0">
    Não há registros para esta aula.
  </div>

  <!-- Listagem de atores participantes -->
  <p ng-repeat="(author_id, entries) in lesson.formatted_data">
      {{role_helper(lesson.actors[author_id].role)}}: {{lesson.actors[author_id].full_name }}
  </p> <!-- .chip -->

  <strong>Observação:</strong>
  <div class="observacao-area" ng-bind-html="lesson.observation">
  </div>

  <div class="clearfix"></div>

  <!-- Listagem de hashtags -->
  <a href="<?php echo $this->Url->build('/feed/') ?>?hashtag_id={{entries.hashtag.id}}" class="chip chip-hashtag grey lighten-3" ng-repeat="(id, entries) in lesson.lesson_hashtags">
    #{{entries.hashtag.name }}
  </a> <!-- .chip -->

      <a href="javascript:;" data-id="{{lesson.id}}" modal class="cd-read-more">Veja mais</a>
    </div> <!-- cd-timeline-content -->
  </div> <!-- cd-timeline-block -->

</section>
