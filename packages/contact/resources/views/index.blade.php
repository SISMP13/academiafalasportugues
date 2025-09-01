@extends('bpanel4::layouts.bpanel-app')

@section('title', 'Editar página de contacto')

@section('content')
    <div class="card bcard">
        <div class="card-header bgc-primary-d1 text-white border-0 d-flex justify-content-between">
            <h4 class="text-120 mb-0">
                <span class="text-90">Página de contacto</span>
            </h4>
            @include('language::partials.form-languages', ['model' => $model, 'edit_route_name' => 'contact.index',  'currentLanguage' => $language])
        </div>

        <form class="mt-lg-3" autocomplete="off" method="post" action="{{ route('contact.update', ['model' => $model, 'locale' => $language]) }}" enctype="multipart/form-data">
            @csrf

            @livewire('form::input-text', ['name' => 'title', 'labelText' => 'Título', 'required'=>true, 'value' => $model->title])
            @livewire('utils::tinymce-editor', ['name' => 'text', 'labelText' => 'Texto', 'value' => $model->text])
            {{--@livewire('form::textarea', ['name' => 'text', 'labelText' => 'Texto', 'required'=>false, 'value' => $model->text])--}}
            {{--@livewire('form::input-text', ['name' => 'address', 'labelText' => 'Dirección', 'required'=>false, 'value' => $model->address])
            --}}{{--@livewire('form::input-text', ['name' => 'phone', 'labelText' => 'Teléfono', 'required'=> false, 'value' => $model->phone])
            @livewire('form::input-text', ['name' => 'mobile', 'labelText' => 'Móvil', 'required'=> false, 'value' => $model->mobile])
            @livewire('form::input-text', ['name' => 'fax', 'labelText' => 'Fax', 'required'=> false, 'value' => $model->fax])
            @livewire('form::input-text', ['name' => 'email', 'labelText' => 'Email', 'required'=>false, 'value' => $model->email])--}}
            {{--@livewire('form::input-text', ['name' => 'latitude', 'labelText' => 'Latitud', 'required'=>true, 'value' => $model->latitude])
            @livewire('form::input-text', ['name' => 'longitude', 'labelText' => 'Longitud', 'required'=>true, 'value' => $model->longitude])
            @livewire('form::input-text', ['name' => 'zoom', 'labelText' => 'Zoom', 'required'=>true, 'value' => $model->zoom])--}}


            @livewire('content-multimedia::upload-content-multimedia-widget', ['model' => $model, 'allowedFormats' => $allowedFormats, 'allowedExtensions' => $allowedExtensions])
            @livewire('content-multimedia-images::content-multimedia-images-widget', ['contentId' => $model->content->id, 'module' => 'contact', 'permission' => 'contact.edit'])
            @livewire('seo::seo-fields', ['model' => $model])

            @livewire('utils::created-updated-info', ['model' => $model])

            <link rel="stylesheet" href="{{ asset('assets/vendor/leaflet/leaflet.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/vendor/leaflet/leaflet-control-geocoder/Control.Geocoder.css') }}">
            <script src="{{ asset('assets/vendor/leaflet/leaflet.js') }}"></script>
            <script src="{{ asset('assets/vendor/leaflet/leaflet-control-geocoder/Control.Geocoder.min.js') }}"></script>
            <div class="form-group row justify-content-center mt-5">
                <div class="col-12 col-xl-9">
                    <p>Esta web usa Open Street Maps para la localización geográfica. La localización por defecto es en <strong>Badajoz - Centro</strong>.</p>
                    <p><strong>Encuentra las coordenadas moviendo el mapa</strong>:</p>
                    <ul>
                        <li>Arrastra el marcador hasta la localización deseada.</li>
                        <li>Haga Zoom para una mayor precisión (se guardará este dato para mostrarlo en la parte pública).</li>
                        <li>Las coordenadas se actualizarán en cada vez que se mueva el marcador.</li>
                        <li>Al pinchar en un lugar del mapa se actualizarán tanto la posición del marcador como las coordenadas.</li>
                    </ul>
                    <p><strong>Encuentre las coordenadas usando el nombre y/o la dirección del lugar a través del icono de búsqueda en la parte superior derecha del mapa.</strong></p>
                    <p>También puede establecer manualmente la longitud y latitud desde sus correspondientes campos.</p>
                    <div class="table-responsive">
                        <table class="table table-condensed table-bordered table-hover table-striped">
                            <tbody>
                            <tr>
                                <th class="text-right">
                                    <label class="control-label">Latitud:</label>
                                </th>
                                <td>
                                    <label class="sr-only" for="latitude">Latitud</label>
                                    <input type="text" name="latitude" id="latitude" value="{{ $model->latitude }}" class="form-control">
                                </td>
                                <th class="text-right">
                                    <label class="control-label">Longitud:</label>
                                </th>
                                <td>
                                    <label class="sr-only" for="longitude">Longitud</label>
                                    <input type="text" name="longitude" id="longitude" value="{{ $model->longitude }}" class="form-control">
                                </td>
                                <th class="text-right">
                                    <label class="control-label">Zoom:</label>
                                </th>
                                <td>
                                    <label class="sr-only" for="zoom">Zoom</label>
                                    <input type="text" name="zoom" id="zoom" value="{{ $model->zoom }}" readonly class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <div id="mapCanvas" class="embed-responsive embed-responsive-4by3"></div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <script type="module">
                        let map = L.map("mapCanvas", {scrollWheelZoom: false}).setView([{{ $model->latitude }}, {{ $model->longitude }}], {{ $model->zoom }});
                        L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
                            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                        }).addTo(map);
                        let geocoder = L.Control.geocoder({
                            defaultMarkGeocode: false
                        }).on("markgeocode", function(e) {
                            let bbox = e.geocode.bbox;
                            let poly = L.polygon([
                                bbox.getSouthEast(),
                                bbox.getNorthEast(),
                                bbox.getNorthWest(),
                                bbox.getSouthWest()
                            ], {color: "transparent"}).addTo(map);
                            map.fitBounds(poly.getBounds());
                        }).addTo(map);
                        let marker = L.marker([{{ $model->latitude }}, {{ $model->longitude }}], {draggable: "true"}).addTo(map);
                        marker.on("dragend", function(e){
                            let eventTarget = e.target;
                            let position = eventTarget.getLatLng();
                            eventTarget.setLatLng(new L.LatLng(position.lat, position.lng),{draggable: "true"});
                            map.panTo(new L.LatLng(position.lat, position.lng));
                            $("#latitude").val(position.lat);
                            $("#longitude").val(position.lng);
                        });
                        map.addLayer(marker);
                        map.on("zoomend", function(e) {
                            $("#zoom").val(e.target.getZoom());
                        });
                        map.on("click", function(e){
                            let position = e.latlng;
                            marker.setLatLng(e.latlng);
                            map.panTo(new L.LatLng(position.lat, position.lng));
                            $("#latitude").val(position.lat);
                            $("#longitude").val(position.lng);
                        });
                    </script>
                </div>
            </div>

            <div class="col-12 mt-5 border-t-1 bgc-secondary-l4 brc-secondary-l2 py-35 d-flex justify-content-center">
                @livewire('form::save-button',['theme'=>'save'])
                @livewire('form::save-button',['theme'=>'reset'])
            </div>
            @livewire('form::input-hidden', ['name' => 'locale', 'value'=> $language])
            @livewire('form::input-hidden', ['name' => 'id', 'value'=> $model->id])
            <input type="hidden" name="_method" value="PUT">
        </form>
    </div>

    @livewire('multimedia::multimedia-images-library')
@endsection
