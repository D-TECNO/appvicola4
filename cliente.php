<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Document</title>
    <!-- stylos para el dash -->
    <link rel="stylesheet" href="css/style.css">
    <link href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js" type="text/javascript"></script>  
</head>
<body>
    <!-- parametros de grid en el main -->
    <main>    
        <!-- parametros del header y el search bar -->
        <header>
            <article class="search-container">
                <!-- <a href="">
                    <img class="search-icon" src="img/busqueda.png" alt="buscar" title="Buscar">
                </a>
                <input type="search" name="Buscar" placeholder="Buscar producto, cliente, proveedor..."> -->
            </article>
            <!--
            <a href="">
                <img src="./img/campanas.png" alt="Notificaciones" title="Notificaciones">
            </a>
            <a href="">
                <img src="img/sobres.png" alt="Mensajes" title="Mensajes">
            </a>
            <a href="">
                <img src="img/circulo-de-usuario.png" alt="Usuario" title="Usuario">
            </a> -->
            <a href="ingreso.html">
                <img src="img/logout.png" alt="Cerrar sesión" title="Cerrar sesión">
            </a>
        </header>
            <!-- parametros del menu -->
        <aside>
            <!-- titulos del menu -->
            <section class="menu-title">
                <img class="menu-logo"src="img/icono.png" alt="Logo">
                <h2>Salsamentaria Palermo</h2>
            </section>
            <!-- items del menu -->
            <ul class="menu-items">
                <li>
                    <a href="./index.php"><img src="./img/caja-abierta.png" alt="Clientes">Resumen</a>    
                           
                </li>
                <li>
                    <a href="./cliente.php"><img src="./img/group_.png" alt="Clientes">Clientes</a>    
                           
                </li>
                
                <li>
                    <a href="./productos.php"><img src="./img/storefront_FILL0_wght400_GRAD0_opsz40.png" alt="Productos">Productos</a>
                    
                </li>
                <li>
                    <a href=""><img src="./img/almacen-alternativo.png" alt="Inventario">Inventario</a>
                    
                </li>
                <li>
                    <a href=""><img src="./img/article_.png" alt="Categorias">Categorias</a>
                    
                </li>
                <li>
                    <a href=""><img src="./img/sell_.png" alt="Ventas">Ventas</a>
                    
                </li>
                <li>
                    <a href=""><img src="./img/inventory_FILL0_wght400_GRAD0_opsz40.png" alt="Compradores">Compras</a>
                    
                </li>
                <li>
                    <a href="proveedores.php"><img src="./img/local_shipping.png" alt="Proveedores">Proveedores</a>
                    
                </li>
            </ul>

        </aside>

        <!-- contenedor central -->
        <section class="main-section">
            <section class="boton-modal">
                <h2>Clientes</h2>
                <label for="btn-modal">
                    Agregar Cliente
                </label>
                
            </section>
            <section class="tabular--wrapper">
                <h3 class="tabla--title">Información general de clientes </h3>
                <article class="table-container">
                    <table id="tabla">
                        <thead>
                            <tr>
                                <th>TIPO DOCUMENTO</th>
                                <th>DOCUMENTO</th>
                                <th>NOMBRES</th>                                
                                <th>CORREO</th>
                                <th>TELEFONO</th>
                                <th>FECHA CREACION</th>
                                <th>ESTADO</th>
                                <th>ACCIÓN</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                                include 'conexion.php';                                
                                include 'consultaCliente.php';
                                while($fila=mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <td><?php echo $fila['tipo_documento'] ?></td>
                                <td><?php echo $fila['documento'] ?></td>
                                <td><?php echo $fila['primer_nombre'].' '.$fila['primer_apellido'] ?></td>                                
                                <td><?php echo $fila['correo'] ?></td>  
                                <td><?php echo $fila['celular'] ?></td>
                                <td><?php echo $fila['fyh_creacion'] ?></td>
                                <td><?php echo $fila['habilitado'] ?></td>
                                <td>
                                <?php echo "<a href='update.php?id=".$fila['documento']."'>Editar</a>"; ?>
                                -
                                <?php echo "<a href='delete.php?id=".$fila['documento']."'>Eliminar</a>"; ?>
                                -
                                <?php echo "<a href='direccion.php?id=".$fila['documento']."'>Direccion</a>"; ?>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="10"></td>
                            </tr>
                        </tfoot>
                        
                    </table>
                </article>
                   
            </section>

        </section>

        <!-- Venta emergente de registro ------------------------------------->
        <input type="checkbox" id="btn-modal">
        <article class="container-modal">
            <span class="content-modal">
                <h2>INGRESE DATOS DE CLIENTE</h2>
                <form class ="form" action="">
                    <article class="form-container">
                        
                        <article class="form-group">
                            <input type="text" id="name" class="form__input"  placeholder=" " autocomplete="name" required> 
                            <label for="name" class="form__label">Nombres</label>
                            <span class="form__line"></span>
                        </article>
                        <article class="form-group">
                            <input 
                                class="form__input"
                                type="text"
                                name="Apellidos"
                                id="Apellidos"
                                placeholder=" "
                                autocomplete="family-name"
                                required
                            > 
                            <label for="Apellidos" class="form__label">Apellidos</label>
                            <span class="form__line"></span>
                        </article>
                        <article class="form-group">
                            <input 
                                class="form__input"
                                type="email"
                                name="email"
                                id="email"
                                placeholder=" "
                                autocomplete="email"
                                required
                            > 
                            <label for="email" class="form__label">Correo electrónico</label>
                            <span class="form__line"></span>
                        </article>
                        <article class="form-group">
                            <input 
                                class="form__input"
                                type="text"
                                name="Dirección"
                                id="Dirección"
                                placeholder=" "
                                autocomplete="on"
                                required
                            > 
                            <label for="Dirección" class="form__label">Dirección</label>
                            <span class="form__line"></span>
                        </article>
                        <article class="form-group">
                            <input 
                                class="form__input"
                                type="tel"
                                name="Teléfono"
                                id="Teléfono"
                                placeholder=" "
                                autocomplete="on"
                                required
                            > 
                            <label for="Teléfono" class="form__label">Teléfono</label>
                            <span class="form__line"></span>
                        </article>
                    
                        
                    </article>    
                                    
                    </form>
                <article class="btn-cerrar">
                    <article class="btn-cerrar">
                    <input type="submit" value="Registrar">
                </article>
            </span>
            <label for="btn-modal" class="cerrar-modal"></label>
        </article>


          <!-- footer del dash -->
          <footer>
            <ul class="footer-items">
                <li>
                    <a href="">Privacidad</a>
                </li>
                <li>
                    <a href="">Condiciones</a>
                </li>
                <li>
                    <a href="">Contacto</a>
                </li>
            </ul>
        </footer>
    </main>
</body>
<script>
  
    $(document).ready(function() {
    $('#tabla').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {            
            extend: 'copy',
            text: '<u>C</u>opiar',
            key: {
                key: 'c',
                altKey: true
                
            },
            title: 'Reporte Salsamentaria Palermo Sur'
            },
            {
            extend: 'print',
            text: '<u>I</u>mprimir',
            key: {
                key: 'i',
                altKey: true
            },
            title: 'Reporte Salsamentaria Palermo Sur'
            },
            {
            extend: 'pdf',
            text: '<u>P</u>DF',
            key: {
                key: 'p',
                altKey: true
            },
            title: 'Reporte Salsamentaria Palermo Sur'
            },
            {
            extend: 'excel',
            text: '<u>E</u>xcel',
            key: {
                key: 'k',
                altKey: true
            },  
            title: 'Reporte Salsamentaria Palermo Sur'
            }
        ],
        pageLength: 4,
        language: {
            search: "Buscar:",
            lengthMenu: "Mostrar _MENU_ registros por página",
            zeroRecords: "No se encontraron registros",
            info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
            infoEmpty: "Mostrando 0 a 0 de 0 registros",
            infoFiltered: "(filtrados de _MAX_ registros totales)",
            paginate: {
                first: "Primero",
                previous: "Anterior",
                next: "Siguiente",
                last: "Último"
            }
        }
    });
}); 
</script>

<script src="https://code.jquery.com/jquery-3.7.0.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js" type="text/javascript"></script>
</html>