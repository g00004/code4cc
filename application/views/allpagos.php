<div class="container pt-4">
    <div class="card">
        <div class="card-header">
            Pagos Registrados
        </div>
        <div class="card-body">
            <div id="gridContainer"></div>
        </div>
    </div>    
    
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
const data = JSON.parse('<?php echo $table;?>');
$(document).ready(function() {
    var dataGrid = $("#gridContainer").dxDataGrid({
        dataSource: data,
        showBorders: true,
    }).dxDataGrid("instance");
 
});
</script>