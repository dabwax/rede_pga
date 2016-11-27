<section id="cd-timeline" ng-controller="TimelineCtrl" data-card="<?php echo @$_GET['card']; ?>">

  <!-- Modal Structure -->
  <?php echo $this->element("../Feed/modal"); ?>

  <div class="cd-timeline-block" ng-repeat="lesson in lessons" ng-class-odd="'odd'" ng-class-even="'even'">


    <div class="cd-timeline-img" style="background: #33d1ff;">
    </div> <!-- cd-timeline-img -->

    <div class="cd-timeline-content card grey lighten-4">

      <div class="card-content">

        <span class="card-title">{{lesson.date_d}}/{{lesson.date_m}}/{{lesson.date_y}}</span>

        <div class="card-panel small grey lighten-2" ng-if="lesson.formatted_data.length == 0">
          Não há registros para esta aula.
        </div>

        <!-- Listagem de atores participantes -->
        <p ng-repeat="(author_id, entries) in lesson.formatted_data">
            {{role_helper(lesson.actors[author_id].role)}}: {{lesson.actors[author_id].full_name }}
        </p> <!-- .chip -->

        <strong>Observação:</strong>

        <div class="observacao-area" ng-bind-html="lesson.observation"></div>

        <div class="clearfix"></div>

        <!-- Listagem de hashtags -->
        <a href="<?php echo $this->Url->build('/feed/') ?>?hashtag_id={{entries.hashtag.id}}" class="chip chip-hashtag grey lighten-3" ng-repeat="(id, entries) in lesson.lesson_hashtags">
          #{{entries.hashtag.name }}
        </a> <!-- .chip -->

        <a href="javascript:;" expandir-timeline ng-if="lesson.observation.length > 40" class="cd-keep-reading">Continuar lendo</a>
        <a href="javascript:;" data-id="{{lesson.id}}" modal class="btn">Veja mais</a>

      </div>

    </div> <!-- cd-timeline-content -->
  </div> <!-- cd-timeline-block -->

</section>
