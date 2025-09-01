<div class="text-center">
    @livewire('utils::datatable-action-buttons', ['actions' => ["edit", "delete"], 'scope' => 'legal-text', 'model' => $row, 'permission' => ['edit', 'delete'], 'id' => $row->id, 'message' => 'el termino legal?'], key('legal-text-buttons-'.$row->id))
</div>
