<div class="content-wrapper">
    <section class="content-header">
        <h1>Diseno Logos</h1>
        
    </section>

    <section class="content">
       
        
        <form action="modelos/subir_imagen.php" method="post" enctype="multipart/form-data">
            <table class="table table-bordered table-striped dt-responsive tablas">
                <thead>
                    <tr>
                        <th style="width:10px">#</th>
                        <th>Diseño</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Logo Pequeno</td>
                        <td>
                            <input type="file" name="logo_mini" id="logo_mini">
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Logo Largo</td>
                        <td>
                            <input type="file" name="logo_grande" id="logo_grande">
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Logo  Del Login</td>
                        <td>
                            <input type="file" name="logo_login" id="logo_login">
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Subir Fondo Del Login</td>
                        <td>
                            <input type="file" name="fondo_login" id="fondo_login">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <button type="submit" name="submit" class="btn btn-primary">Subir Imágenes</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </section>
</div>
