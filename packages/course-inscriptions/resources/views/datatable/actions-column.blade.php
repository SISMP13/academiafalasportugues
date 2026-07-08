<div class="text-center">
    @livewire('utils::datatable-action-buttons', ['actions' => ["edit", "delete"], 'scope' => 'courses.course-inscriptions', 'model' => $row, 'permission' => ['edit', 'delete'], 'id' => $row->id, 'message' => 'la inscripción?'], key('course-inscription-buttons-'.$row->id))
</div>
