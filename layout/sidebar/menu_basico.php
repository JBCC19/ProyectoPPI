<!-- En caso de no iniciar sesion se mostrara la pestañas solo de busqueda -->
<div class="sidebar-heading">
                Filtrar
            </div>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Buscar Sitio</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Localizar Empresa</h6>

            <!-- Formulario para ingresar texto -->
            <form>
    <div class="form-group">
        <label for="textoInput">Ingrese Tipo Empresa:</label>
        <input type="text" class="form-control" id="textoInput" placeholder="Buscar sitio">
    </div>

    <!-- Combo box para la región -->
    <div class="form-group">
        <label for="regionSelect">Seleccione Región:</label>
        <select class="form-control" id="regionSelect">
            <option value="region1">Región 1</option>
            <option value="region2">Región 2</option>
            <!-- Agregar más opciones según sea necesario -->
        </select>
    </div>

    <!-- Combo box para la ciudad y capital -->
    <div class="form-group">
        <label for="ciudadCapitalSelect">Seleccione Ciudad/Capital:</label>
        <select class="form-control" id="ciudadCapitalSelect">
            <option value="ciudad1">Ciudad 1</option>
            <option value="ciudad2">Ciudad 2</option>
            <!-- Agregar más opciones según sea necesario -->
        </select>
    </div>

    <!-- Agregar más campos según sea necesario -->

    <button type="submit" class="btn btn-primary">Buscar</button>
    
    </form>

    </div>
    </div>
</li>