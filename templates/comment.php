<?php foreach ($comments as $comment): ?>
  <div id="comment-card" class="mdl-card__actions mdl-card--border">
    <div class="counter material-icons mdl-badge mdl-badge--overlap" data-badge="140"></div>
     <div class="mdl-card__actions mdl-card--border">
    <p><span class="commentCount">1</span> <span class="people"><i class="material-icons">person</i> <?php echo $comment->comment?></span></p>
    </div>
    <ul class="posts collection mdl-list">
    <li class="mdl-list__item collection-item"><i class="material-icons">textsms</i><span class="dateStyle">2017-02-23</span></li></ul>
  </div>
<?php endforeach; ?>