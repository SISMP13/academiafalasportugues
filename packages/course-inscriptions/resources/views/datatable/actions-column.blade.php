<div class="text-center">
    @livewire('utils::datatable-action-buttons', ['actions' => ["edit"], 'scope' => 'courses.course-inscriptions', 'model' => $row, 'permission' => ['edit'], 'id' => $row->id], key('course-inscription-buttons-'.$row->id))
</div>
