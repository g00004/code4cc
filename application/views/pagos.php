<div class="container pt-4">
    <div class="card">
        <div class="card-header">
            Registrar Pagos
        </div>
        <div class="card-body">
            <form method="post" id="formPago">
                <div class="row">
                    <div class="col-md-6">
                    <div class="row mb-3">
                        <div class="col-md-3"><label for="">Usuarios:</label></div>
                        <div class="col-md-9">
                            <select name="user_id" id="user_id" class="form-control">
                                <option value="">--Seleccione Usuario--</option>
                                <?php foreach($usuarios as $user){ ?>
                                    <option value="<?=$user->id?>"><?=$user->nombres?> <?=$user->apellidos?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-6"></div>
                </div>
                <div id="form"></div>
            </form>
        </div>
    </div>    
    
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>


$(document).ready(function() {

    $('#form').dxForm({
    items: [{
      itemType: 'group',
      colCount: 2,
      items: [
        {
            dataField: 'Cantidad',
            validationRules: [{
                type: 'required',
                message: 'Cantidad requerido',
            }]
        }, 
        {
            dataField: 'MontoPorPagar',
            validationRules: [{
                type: 'required',
                message: 'Monto por pagar requerido',
            }]
        },
        {
            dataField: 'FechaPagar',
            editorType: 'dxDateBox',
            validationRules: [{
                type: 'required',
                message: 'Fecha requerido',
            }],
            editorOptions: {
                width: '100%',
            }
        },
        {
            colSpan: 2,
            dataField: 'Comentarios',
            editorType: 'dxTextArea',
            validationRules: [{
                type: 'required',
                message: 'Comentario requerido',
            }]
        },
        {
            itemType: "button",
            buttonOptions: {
                text: "Guardar",
                useSubmitBehavior: true
            }
        }
        ]
    }],
  });

  $('#form').dxForm('instance').validate();

  $('#formPago').on('submit', function(e) {
        e.preventDefault();
        $.ajax({                  
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/welcome/registrarPago",
            data: $("#formPago").serialize() 
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
                window.location.href = "<?php echo base_url(); ?>index.php/welcome/allpagos";
            })
        })
    })
});

</script>