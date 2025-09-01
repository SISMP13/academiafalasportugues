<div>
    <h5>Integraciones Existentes</h5>

    @foreach ($integrations as $integration)
        <div class="border p-3 mb-2 rounded">
            <div class="row align-items-center">
                <div class="col-sm-8">
                    <strong>{{ $integration->title }}</strong> ({{ ucfirst($integration->type) }})
                    @if($integration->type === 'youtube' || $integration->type === 'vimeo' || $integration->type === 'tiktok')
                        <div><a href="{{ $integration->url }}" target="_blank">{{ $integration->url }}</a></div>
                    @else
                        <div>IFRAME</div>
                    @endif
                </div>
                <div class="col-sm-4 text-right">
                    @if(!$loop->first)
                        <button wire:click="moveUp({{ $integration->id }})" class="btn btn-sm btn-info mr-1">
                            <i class="fas fa-chevron-up"></i>
                        </button>
                    @endif
                    @if(!$loop->last)
                        <button wire:click="moveDown({{ $integration->id }})" class="btn btn-sm btn-info mr-1">
                            <i class="fas fa-chevron-down"></i>
                        </button>
                    @endif
                    <button wire:click="edit({{ $integration->id }})" class="btn btn-sm btn-warning" data-toggle="modal">
                        <i class="fas fa-pencil-alt"></i> Editar
                    </button>
                    <button onclick="return confirm('¿Seguro que quieres borrar la integración?') || event.stopImmediatePropagation()"
                            wire:click="delete({{ $integration->id }})" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash-alt"></i> Eliminar
                    </button>
                </div>
            </div>
            {{-- Modal Bootstrap --}}
            <div wire:ignore.self class="modal fade" id="editIntegrationModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form wire:submit.prevent="update" class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Editar Integración</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="form-group">
                                <label>Título</label>
                                <input type="text" wire:model.defer="title" class="form-control">
                                @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label>Tipo</label>
                                <select wire:model.defer="type" class="form-control">
                                    <option value="youtube">YouTube</option>
                                    <option value="vimeo">Vimeo</option>
                                    <option value="tiktok">TikTok</option>
                                    <option value="instagram">Instagram</option>
                                    <option value="facebook">Facebook</option>
                                    <option value="x">X</option>
                                </select>
                                @error('type') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label>URL o código de inserción</label>
                                <textarea wire:model.defer="url" class="form-control" rows="5"></textarea>
                                @error('url') <span class="text-danger">{{ $message }}</span> @enderror
                                <div class="alert alert-info mt-2">
                                    <ul>
                                        <li>En caso de ser del tipo Youtube, Vimeo o Tiktok: insertar url</li>
                                        <li>En caso de ser del tipo Facebook, X o Instagram: insertar código de inserción</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    @if (session()->has('message'))
        <div class="alert alert-success mt-3">{{ session('message') }}</div>
    @endif
</div>
