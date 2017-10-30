<script>
$('#nav-calendario').addClass('active');
</script>

<div class="row-create">
    AGENDAR ACTIVIDAD
</div>
      

<div class="card">
    <div class="content">

        <?php echo $this->renderPartial('_form', array('model' => $model)); ?>

    </div>
</div>

