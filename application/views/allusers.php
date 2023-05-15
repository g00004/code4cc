<div class="container pt-4">
    <div class="card">
        <div class="card-header">
            Usuarios
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
        columns: [
            'nombres',
            {
            type: "buttons",
            buttons: ["delete", {
                text: "Eliminar",
                hint: "Eliminar",
                onClick: function (e) {
                    $.ajax({                  
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/welcome/deleteUser",
                        data: { id : e.row.data.id} 
                    })
                    .done(function (respuesta) {
                        let response = JSON.parse(respuesta);
                        Swal.fire({
                            icon: response.type,
                            title: response.mensaje,
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Aceptar'
                        }).then((result) => {
                            dataGrid.deleteRow(e.row.rowIndex);
                        })
                    })
                }
            }]
        }
        ]
        
    }).dxDataGrid("instance");
 
});
</script>