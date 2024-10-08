@extends('layouts.app', ['activePage' => 'form_extended', 'menuParent' => 'forms', 'titlePage' => __('Extended Forms')])

@section('content')
  <div class="content">
    <div class="row">
      
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Date-Time-Picker</h4>
          </div>
          <div class="card-body">
            <div class="form-group">
              <input type="text" class="form-control datetimepicker" value="10/05/2018">
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Date Picker</h4>
          </div>
          <div class="card-body">
            <div class="form-group">
              <input type="text" class="form-control datepicker" value="10/05/2018">
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Time Picker</h4>
          </div>
          <div class="card-body">
            <div class="form-group">
              <input type="text" class="form-control timepicker" value="10/05/2018">
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 mb-4">
                <h4 class="card-title">Toggle Buttons</h4>
                <div class="row mb-3">
                  <div class="col-md-4">
                    <p class="category">Default</p>
                    <input type="checkbox" checked name="checkbox" class="bootstrap-switch" data-on-label="ON" data-off-label="OFF" />
                    <input type="checkbox" name="checkbox" class="bootstrap-switch" data-on-label="ON" data-off-label="OFF" />
                  </div>
                  <div class="col-md-4">
                    <p class="category">Plain</p>
                    <input type="checkbox" checked name="checkbox" class="bootstrap-switch" data-on-label="" data-off-label="" />
                    <input type="checkbox" name="checkbox" class="bootstrap-switch" data-on-label="" data-off-label="" />
                  </div>
                  <div class="col-md-4">
                    <p class="category">With Icons</p>
                    <input type="checkbox" checked name="checkbox" class="bootstrap-switch" data-on-label="<i class='tim-icons icon-check-2'></i>" data-off-label="<i class='tim-icons icon-simple-remove'></i>" />
                    <input type="checkbox" name="checkbox" class="bootstrap-switch" data-on-label="<i class='tim-icons icon-check-2'></i>" data-off-label="<i class='tim-icons icon-simple-remove'></i>" />
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-4">
                <h4 class="card-title">Customisable Select</h4>
                <div class="row">
                  <div class="col-lg-5 col-md-6 col-sm-3">
                    <select class="selectpicker" data-size="7" data-style="btn btn-primary" title="Single Select">
                      <option disabled selected>Single Option</option>
                      <option value="2">Foobar</option>
                      <option value="3">Is great</option>
                    </select>
                  </div>
                  <div class="col-lg-5 col-md-6 col-sm-3">
                    <select class="selectpicker" data-style="btn btn-info" multiple title="Choose City" data-size="7">
                      <option disabled> Multiple Options</option>
                      <option value="2">Paris </option>
                      <option value="3">Bucharest</option>
                      <option value="4">Rome</option>
                      <option value="5">New York</option>
                      <option value="6">Miami </option>
                      <option value="7">Piatra Neamt</option>
                      <option value="8">Paris </option>
                      <option value="9">Bucharest</option>
                      <option value="10">Rome</option>
                      <option value="11">New York</option>
                      <option value="12">Miami </option>
                      <option value="13">Piatra Neamt</option>
                      <option value="14">Paris </option>
                      <option value="15">Bucharest</option>
                      <option value="16">Rome</option>
                      <option value="17">New York</option>
                      <option value="18">Miami </option>
                      <option value="19">Piatra Neamt</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-4">
                <h4 class="card-title">Tags</h4>
                <input type="text" value="Amsterdam,Washington,Sydney,Beijing" class="tagsinput" data-role="tagsinput" data-color="danger" />
              </div>
              <div class="col-md-6">
                <h4 class="card-title">Dropdown & Dropup</h4>
                <div class="row">
                  <div class="col-lg-4 col-md-6 col-sm-3">
                    <div class="dropdown">
                      <button class="dropdown-toggle btn btn-primary btn-block" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <h6 class="dropdown-header">Dropdown header</h6>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-3">
                    <div class="dropup">
                      <button type="button" class="dropdown-toggle btn btn-primary btn-block" data-toggle="dropdown">
                        Dropup
                      </button>
                      <div class="dropdown-menu">
                        <h6 class="dropdown-header">Dropdown header</h6>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-4">
                <h4 class="card-title">Progress Bars</h4>
                <div class="progress-container">
                  <span class="progress-badge">Default</span>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                      <span class="progress-value">25%</span>
                    </div>
                  </div>
                </div>
                <div class="progress-container progress-primary">
                  <span class="progress-badge">Primary</span>
                  <div class="progress">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                      <span class="progress-value">60%</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <h4 class="card-title mt-3">Sliders</h4>
                <div id="sliderRegular" class="slider">
                </div>
                <br>
                <div id="sliderDouble" class="slider slider-primary mb-3"></div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-sm-4">
                <h4 class="card-title">Regular Image</h4>
                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                  <div class="fileinput-new thumbnail">
                    <img src="{{ asset('black') }}/img/image_placeholder.jpg" alt="...">
                  </div>
                  <div class="fileinput-preview fileinput-exists thumbnail"></div>
                  <div>
                    <span class="btn btn-rose btn-round btn-file">
                      <span class="fileinput-new">Select image</span>
                      <span class="fileinput-exists">Change</span>
                      <input type="file" name="..." />
                    </span>
                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-4">
                <h4 class="card-title">Avatar</h4>
                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                  <div class="fileinput-new thumbnail img-circle">
                    <img src="{{ asset('black') }}/img/placeholder.jpg" alt="...">
                  </div>
                  <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                  <div>
                    <span class="btn btn-round btn-rose btn-file">
                      <span class="fileinput-new">Add Photo</span>
                      <span class="fileinput-exists">Change</span>
                      <input type="file" name="..." />
                    </span>
                    <br />
                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end card -->
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // initialise Datetimepicker and Sliders
      blackDashboard.initDateTimePicker();
      if ($('.slider').length != 0) {
        demo.initSliders();
      }
    });
  </script>
@endpush