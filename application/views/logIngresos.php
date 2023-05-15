<div class="container pt-4">
    <div class="card">
        <div class="card-header">
            Log de Ingresos y salidas del sistema
        </div>
        <div class="card-body">
            <div id="gridContainer"></div>
        </div>
    </div>    
    
</div>

<script>
const data = JSON.parse('<?php echo $table;?>');
$(document).ready(function() {
    $('#gridContainer').dxDataGrid({
        dataSource: data,
        columns: ['mensaje', 'datetime'],
        showBorders: true,
    });
});

</script>