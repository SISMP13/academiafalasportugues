@livewire('utils::datatable-default', ['fieldName' => 'inscription', 'model' => $row, 'value' => $row->inscription, 'size' => 'xxs'], key('inscription-course-'.$row->id))
