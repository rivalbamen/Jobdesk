<?php foreach ($checklists as $checklist): ?>
<div class="form-group">
  <h4 class="modal-title" id="myLargeModalLabel"><i class="ti-check-box"></i><span id="checklist-<?= $checklist->id; ?>" data-type="text" data-pk="<?= $checklist->id?>" data-title="Enter checklist name" class="editable editable-click liststyle" style="margin-left: 10px;"><?= $checklist->checklistname; ?></span></h4>
  <br/>
  <div class="pull-left"><span>50%</span></div>
  <div class="progress">
    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:90%;"><span class="sr-only">100% Complete</span>
    </div>
  </div>
  <div class="checkbox checkbox-success">
    <input id="checkbox3" type="checkbox">
    <label for="checkbox3"> Success </label>
  </div>
  <a href="#" class="btn btn-block btn-default m-t-10 show-a1">add a checklist</a>
</div>
<script type="text/javascript">
  $(function(){
       $('#checklist-<?= $checklist->id; ?>').editable({
       url: '<?= $this->pathFor('save-checklist');?>',
       type: 'text',
       pk: <?= $checklist->id?>,
       name: 'checklist',
       showbuttons: 'bottom',
       title: 'Enter checklist'
     });

    });
  </script>
<?php endforeach; ?>