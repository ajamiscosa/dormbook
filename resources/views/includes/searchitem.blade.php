@php
  $facilities = \App\Facility::all();
  $temp = array();
  foreach($facilities as $facility) {
    $temp[$facility->ID] = $facility->Description;
  }

$amenities = json_decode($data->Amenities);
@endphp
<style>
  img {
    image-orientation: from-image !important;
  }
</style>
<div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <img id="prevpic" src='{{ asset("uploads/{$data->ID}/1.jpg") }}'>
          </div>
          <div class="col-md-8">
              <div id="accordion" role="tablist" aria-multiselectable="true" class="card-collapse">
                <h3 class="card-title">{{ $data->Name }}</h3>
                <div class="card card-plain">
                  <div class="card-header" role="tab" id="headingOne{{$data->ID}}">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree{{$data->ID}}" aria-expanded="true" aria-controls="collapseThree{{$data->ID}}" rel="#home{{ $data->ID }}">
                      {{ $data->AddressLine1 }}, {{ $data->AddressLine2 }}, {{ $data->City }}, Cavite
                      <i class="nc-icon nc-minimal-down"></i>
                    </a>
                  </div>
                  <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne{{$data->ID}}">
                    <div class="card-body">
                      Ito ay una 
                    </div>
                  </div>
                </div>
                <div class="card card-plain">
                  <div class="card-header" role="tab" id="headingTwo{{$data->ID}}">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree{{$data->ID}}" aria-expanded="false" aria-controls="collapseTwo" rel="#profile{{ $data->ID }}">
                      {{ $data->getOwner()->Name }} / {{ $data->MobileNumber }}
                      <i class="nc-icon nc-minimal-down"></i>
                    </a>
                  </div>
                  <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo{{$data->ID}}">
                    <div class="card-body">
                      Anim pariatur
                    </div>
                  </div>
                </div>
                <div class="card card-plain">
                  <div class="card-header" role="tab" id="headingThree{{$data->ID}}">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree{{$data->ID}}" aria-expanded="false" aria-controls="collapseThree{{$data->ID}}" rel="#messages">
                      {{ $data->Rate }}
                      <i class="nc-icon nc-minimal-down"></i>
                    </a>
                  </div>
                  <div id="collapseThree{{$data->ID}}" class="collapse" role="tabpanel" aria-labelledby="headingThree{{$data->ID}}">
                    <div class="card-body">
                      
                      <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                          <ul id="tabs" class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#home{{ $data->ID }}" role="tab" aria-expanded="true">Amenities</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#profile{{ $data->ID }}" role="tab" aria-expanded="false">Profile</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#photos{{ $data->ID }}" role="tab" aria-expanded="false">Photos</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div id="my-tab-content{{$data->ID}}" class="tab-content text-center">
                        <div class="tab-pane active" id="home{{ $data->ID }}" role="tabpanel" aria-expanded="true">
                          <ul style="list-style-type: none;">
                            @foreach($amenities as $amenity)
                              <li>{{ $temp[$amenity] }}</li>
                            @endforeach
                          </ul>
                        </div>
                        <div class="tab-pane" id="profile{{ $data->ID }}" role="tabpanel" aria-expanded="false">
                          <p>Here is your profile.</p>
                        </div>
                        <div class="tab-pane" id="photos{{ $data->ID }}" role="tabpanel" aria-expanded="false">
                          <div id="carouselExampleControls{{$data->ID}}" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img src='{{ asset("uploads/{$data->ID}/1.jpg") }}' class="d-block w-100" alt="...">
                              </div>
                              @for($i=1;$i<10;$i++)
                                @if(file_exists( public_path()."/uploads/{$data->ID}/{$i}.jpg"))
                                  <div class="carousel-item">
                                    <img src='{{ asset("uploads/{$data->ID}/{$i}.jpg") }}' class="d-block w-100" alt="...">
                                  </div>
                                @endif
                              @endfor
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls{{$data->ID}}" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls{{$data->ID}}" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
          </div><!-- .col-md-6 -->
        </div> <!-- .row inside card-->
      </div>
</div>