<div class="card bcard pb-3">
    <div class="card-header bgc-primary-d1 text-white border-0 d-flex justify-content-between mt-3">
        <h4 class="text-120 mb-0">
            <span class="text-90">Integraciones Multimedia</span>
        </h4>
    </div>
    <div class="card-body">
        @livewire('media-integrations::livewire.integrations-form', ['class' => get_class($model), 'idClass' => $model->id])
        <hr>
        @livewire('media-integrations::livewire.integration-list', ['class' => get_class($model), 'idClass' => $model->id])
    </div>
</div>
