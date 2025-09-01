<div class="text-center">
    @livewire('utils::datatable-action-buttons', ['actions' => ["edit", "delete"], 'scope' => 'courses', 'model' => $row, 'permission' => ['edit', 'delete'], 'id' => $row->id, 'message' => 'el curso?'], key('course-buttons-'.$row->id))
</div>
