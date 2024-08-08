@extends('layouts.app', ['activePage' => 'dashboard', 'menuParent' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
<div class="content">
  <div class="row">
    <div class="col-12">
      <div class="card card-chart">
        <div class="card-header">
          <div class="row">
            <div class="col-sm-6 text-left">
              <h5 class="card-category">Numero de casos de violencia y lesiones</h5>
              <h2 class="card-title">10000</h2>
            </div>
            <div class="col-sm-6">
              <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                <label class="btn btn-sm btn-warning btn-simple active" id="0">
                  <input type="radio" name="options" checked>
                  <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Número Total de Casos</span>
                  <span class="d-block d-sm-none">
                    <i class="tim-icons icon-single-02"></i>
                  </span>
                </label>
                <label class="btn btn-sm btn-warning btn-simple" id="1">
                  <input type="radio" class="d-none d-sm-none" name="options">
                  <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Violencia</span>
                  <span class="d-block d-sm-none">
                    <i class="tim-icons icon-gift-2"></i>
                  </span>
                </label>
                <label class="btn btn-sm btn-warning btn-simple" id="2">
                  <input type="radio" class="d-none" name="options">
                  <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Lesiones</span>
                  <span class="d-block d-sm-none">
                    <i class="tim-icons icon-tap-02"></i>
                  </span>
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="chart-area">
            <canvas id="chartBig1"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6">
      <div class="card card-stats">
        <div class="card-body">
          <div class="row">
            <div class="col-5">
              <div class="info-icon text-center icon-warning">
                <i class="tim-icons icon-chat-33"></i>
              </div>
            </div>
            <div class="col-7">
              <div class="numbers">
                <p class="card-category">Dto extra</p>
                <h3 class="card-title">extra </h3>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <hr>
          <div class="stats">
            <i class="tim-icons icon-refresh-01"></i> Update Now
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6">
      <div class="card card-stats">
        <div class="card-body">
          <div class="row">
            <div class="col-5">
              <div class="info-icon text-center icon-primary">
                <i class="tim-icons icon-shape-star"></i>
              </div>
            </div>
            <div class="col-7">
              <div class="numbers">
                <p class="card-category">Dto extra</p>
                <h3 class="card-title">Dto extra</h3>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <hr>
          <div class="stats">
            <i class="tim-icons icon-sound-wave"></i> Last Research
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6" id="dashboard">
      <div class="card card-stats">
        <div class="card-body">
          <div class="row">
            <div class="col-5">
              <div class="info-icon text-center icon-success">
                <i class="tim-icons icon-single-02"></i>
              </div>
            </div>
            <div class="col-7">
              <div class="numbers">
                <p class="card-category">Dto extra</p>
                <h3 class="card-title">Dto extra</h3>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <hr>
          <div class="stats">
            <i class="tim-icons icon-trophy"></i> Customers feedback
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6">
      <div class="card card-stats">
        <div class="card-body">
          <div class="row">
            <div class="col-5">
              <div class="info-icon text-center icon-danger">
                <i class="tim-icons icon-molecule-40"></i>
              </div>
            </div>
            <div class="col-7">
              <div class="numbers">
                <p class="card-category">Dto extra</p>
                <h3 class="card-title">Dto extra</h3>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <hr>
          <div class="stats">
            <i class="tim-icons icon-watch-time"></i> In the last hours
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card card-chart">
        <div class="card-header">
          <h5 class="card-category"> Demografía-Edad</h5>
          <h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i> 35</h3>
        </div>
        <div class="card-body">
          <div class="chart-area">
            <canvas id="chartLineOrange"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card card-chart">
        <div class="card-header">
          <h5 class="card-category">Migrantes</h5>
          <h3 class="card-title"><i class="tim-icons icon-delivery-fast text-info"></i> Venezuela</h3>
        </div>
        <div class="card-body">
          <div class="chart-area">
            <canvas id="CountryChart"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card card-chart">
        <div class="card-header">
          <h5 class="card-category">Demografía-Nivel Educativo</h5>
          <h3 class="card-title"><i class="tim-icons icon-send text-success"></i> Secundaria</h3>
          <select id="monthSelect" class="selectpicker" data-style="btn btn-info" title="Selecciona un mes" data-size="7">

  <option value="0">Enero</option>
  <option value="1">Febrero</option>
  <option value="2">Marzo</option>
  <option value="3">Abril</option>
  <option value="4">Mayo</option>
  <option value="5">Junio</option>
  <option value="6">Julio</option>
  <option value="7">Agosto</option>
  <option value="8">Septiembre</option>
  <option value="9">Octubre</option>
  <option value="10">Noviembre</option>
  <option value="11">Diciembre</option>
</select>

        </div>
        <div class="card-body">
          <div class="chart-area">
            <canvas id="chartLineGreen"></canvas>
          </div>
        </div>
      </div>
    </div>
    
   
  </div>
  <div class="row">
    <div class="col-md-6 ml-auto mr-auto">
      <div class="card card-chart card-chart-pie">
        <div class="card-header">
          <h5 class="card-category">Sexo</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-6">
              <div class="chart-area">
                <canvas id="PieChart"></canvas>
              </div>
            </div>
            <div class="col-6">
              <h4 class="card-title"><i class="tim-icons  icon-trophy text-success "></i> Sexo  : Hombres</h4>
              <p class="category">58000</p>
            </div>
          </div>
        </div>
      </div>
      
    </div>
   
  </div>
  <div class="row">
   
  
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Global Sales by Top Locations</h4>
          <p class="card-category">All products that were shipped</p>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="table-responsive">
                <table class="table">
                  <tbody>
                    <tr>
                      <td>
                        <div class="flag">
                          <img src="{{ asset("black") }}/img/US.png" alt="flag">
                        </div>
                      </td>
                      <td>USA</td>
                      <td class="text-right">
                        2.920
                      </td>
                      <td class="text-right">
                        53.23%
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="flag">
                          <img src="{{ asset("black") }}/img/DE.png" alt="flag">
                        </div>
                      </td>
                      <td>Germany</td>
                      <td class="text-right">
                        1.300
                      </td>
                      <td class="text-right">
                        20.43%
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="flag">
                          <img src="{{ asset("black") }}/img/AU.png" alt="flag">
                        </div>
                      </td>
                      <td>Australia</td>
                      <td class="text-right">
                        760
                      </td>
                      <td class="text-right">
                        10.35%
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="flag">
                          <img src="{{ asset("black") }}/img/GB.png" alt="flag">
                        </div>
                      </td>
                      <td>United Kingdom</td>
                      <td class="text-right">
                        690
                      </td>
                      <td class="text-right">
                        7.87%
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="flag">
                          <img src="{{ asset("black") }}/img/RO.png" alt="flag">
                        </div>
                      </td>
                      <td>Romania</td>
                      <td class="text-right">
                        600
                      </td>
                      <td class="text-right">
                        5.94%
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="flag">
                          <img src="{{ asset("black") }}/img/BR.png" alt="flag">
                        </div>
                      </td>
                      <td>Brasil</td>
                      <td class="text-right">
                        550
                      </td>
                      <td class="text-right">
                        4.34%
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-md-6 ml-auto mr-auto">
              <div id="worldMap" style="height: 300px;"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();
      demo.initVectorMap();
     
   
    });
  </script>
@endpush