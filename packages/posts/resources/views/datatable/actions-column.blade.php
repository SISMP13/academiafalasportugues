<div class="text-center">
    @livewire('utils::datatable-action-buttons', ['actions' => ["edit", "delete"], 'scope' => 'posts', 'model' => $row, 'permission' => ['edit', 'delete'], 'id' => $row->id, 'message' => config("bpanel4-posts.modal-destroy-message")], key('post-buttons-'.$row->id))
</div>
