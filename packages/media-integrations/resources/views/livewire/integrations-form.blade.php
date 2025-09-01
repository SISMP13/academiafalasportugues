<div>
    <form wire:submit.prevent="save">
        <h5>Añadir Nueva Integración</h5>
            <div class="m-3 p-3 border">
                <div class="form-group">
                    <label>Título <span class="text-danger">*</span></label>
                    <input type="text" wire:model="title" class="form-control" placeholder="Título">
                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group mt-2">
                    <label>Tipo <span class="text-danger">*</span></label>
                    <select wire:model="type" class="form-control">
                        <option value="youtube">YouTube</option>
                        <option value="vimeo">Vimeo</option>
                        <option value="tiktok">TikTok</option>
                        <option value="instagram">Instagram</option>
                        <option value="facebook">Facebook</option>
                        <option value="x">X</option>
                    </select>
                    @error('type') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group mt-2">
                    <label>URL o código de inserción <span class="text-danger">*</span></label>
                    <textarea wire:model="url" class="form-control" placeholder="https://..." rows="5"></textarea>
                    @error('url') <span class="text-danger">{{ $message }}</span> @enderror
                    <div class="alert alert-info mt-2">
                        <ul>
                            <li>En caso de ser del tipo Youtube, Vimeo o Tiktok: insertar url</li>
                            <li>En caso de ser del tipo Facebook, X o Instagram: insertar código de inserción</li>
                        </ul>
                    </div>
                </div>
            </div>
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar Integraciones</button>
    </form>

    @if (session()->has('message'))
        <div class="alert alert-success mt-3">{{ session('message') }}</div>
    @endif
</div>
