<div class="text-center">
    @livewire('utils::datatable-action-buttons', ['actions' => ["edit", "delete"], 'scope' => 'home-slides', 'model' => $row, 'permission' => ['edit', 'delete'], 'id' => $row->id, 'message' => 'el slide?'], key('home-slide-buttons-'.$row->id))
</div>
