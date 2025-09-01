<div class="text-center">
    @livewire('utils::datatable-action-buttons', ['actions' => ["edit", "delete"], 'scope' => 'services', 'model' => $row, 'permission' => ['edit', 'delete'], 'id' => $row->id, 'message' => config("bpanel4-services.modal-destroy-message")], key('services-buttons-'.$row->id))
</div>
