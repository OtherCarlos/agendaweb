<script>
$('#nav-calendario').addClass('active');
</script>

<section style="text-align: center">
    <h1>Detalle de Actividad del día <?php echo $view["fecha_calendario"] ?></h1>
</section>

<section>
    <div class="row-create">
        TÍTULO: <?php echo $view['titulo'] ?>
    </div>

    <div style="text-align: justify; margin-top: 30px;"> 
        <?php echo $view['resumen'] ?> 
    </div>  
</section>
<?php
if(empty($contenido)){
    $comentario = 'La actividad no posee contenido multimedia';
}else{
    $count = count($contenido);
    $comentario = 'La actividad posee '. $count . ' contenido multimedia'; 
}

?>
<section class="col-md-12">
    <section class="col-md-4 info-calendario" style="text-align: center;" >
        <div class="glyphicon glyphicon-info-sign" style="font-size: 100px; margin-top: 10px;"></div>
        <div style="margin-top: 10px; font-size: 14px;"><?php echo $comentario ?></div>
    </section>

    <section  class="col-md-8" style="text-align: right">
        <div style="font-size: 80px;"> <?php echo date("H:i a", strtotime($view["created_date"])) ?>
            <div class="glyphicon glyphicon-time" style="font-size: 150px; margin-top: 30px;"></div>
        </div>
    </section>

</section>