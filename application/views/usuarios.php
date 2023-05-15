<div class="container pt-4">
    <div class="card">
        <div class="card-header">
            Usuarios
        </div>
        <div class="card-body">
            <form method="post" id="formUsuario">
                <div id="form"></div>
            </form>
        </div>
    </div>    
    
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
const Roles = [
  'Admin',
  'User',
];

const Estado = [
  'Activo',
  'inactivo',
];

$(document).ready(function() {

    $('#form').dxForm({
    items: [{
      itemType: 'group',
      colCount: 2,
      items: [
        {
            dataField: 'Nombres',
            validationRules: [{
                type: 'required',
                message: 'Nombres requerido',
            }]
        }, 
        {
            dataField: 'Apellidos',
            validationRules: [{
                type: 'required',
                message: 'Apellidos requerido',
            }]
        },
        {
            dataField: 'Email',
            validationRules: [{
                type: 'required',
                message: 'Email requerido',
            }]
        }, 
        {
            dataField: 'Password',
            validationRules: [{
                type: 'required',
                message: 'Password requerido',
            }]
        },
        {
            dataField: 'Rol',
            editorType: 'dxSelectBox',
            editorOptions: {
                items: Roles,
                searchEnabled: true,
                value: "",
            },
            validationRules: [{
                type: 'required',
                message: 'Rol is required',
            }],
        },
        {
            dataField: 'Activo',
            editorType: 'dxSelectBox',
            editorOptions: {
                items: Estado,
                searchEnabled: true,
                value: "",
            },
            validationRules: [{
                type: 'required',
                message: 'Estado is required',
            }],
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

  $('#formUsuario').on('submit', function(e) {
        e.preventDefault();
        $.ajax({                  
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/welcome/registrarUsuario",
            data: $("#formUsuario").serialize() 
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
                window.location.href = "<?php echo base_url(); ?>index.php/welcome/allusuarios";
            })
        })
    })
});

</script>