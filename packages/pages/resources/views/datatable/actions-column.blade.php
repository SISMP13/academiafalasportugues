<div class="text-center">
    @livewire('utils::datatable-action-buttons', ['actions' => ["edit", "delete"], 'scope' => 'pages', 'model' => $row, 'permission' => ['edit', 'delete'], 'id' => $row->id, 'message' => 'la página?'], key('page-buttons-'.$row->id))
</div>
