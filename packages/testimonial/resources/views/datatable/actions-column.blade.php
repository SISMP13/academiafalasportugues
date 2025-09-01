<div class="text-center">
    @livewire('utils::datatable-action-buttons', ['actions' => ["edit", "delete"], 'scope' => 'testimonial', 'model' => $row, 'permission' => ['edit', 'delete'], 'id' => $row->id, 'message' => 'el testimonio?'], key('testimonial-buttons-'.$row->id))
</div>
