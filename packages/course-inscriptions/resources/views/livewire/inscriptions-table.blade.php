<div class="space-y-4">

    {{-- filtros --}}
    <div class="flex items-center justify-between">
        <input type="text"
               wire:model.debounce.500ms="search"
               placeholder="Buscar por nombre o correo..."
               class="px-3 py-2 border rounded-lg w-1/3" />

        <select wire:model="selectedCourse"
                class="px-3 py-2 border rounded-lg">
            <option value="">Todos los cursos</option>
            @foreach($courses as $id => $title)
                <option value="{{ $id }}">{{ $title }}</option>
            @endforeach
        </select>
    </div>

    {{-- tabla --}}
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 border rounded-lg shadow-sm">
            <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nombre completo</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Correo electrónico</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Teléfono</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Mensaje</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Curso</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @forelse($inscriptions as $inscription)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $inscription->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $inscription->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $inscription->phone }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $inscription->message }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ optional($inscription->course)->getTranslation('title', app()->getLocale(), true) ?? '—' }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">No se encontraron inscripciones</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    {{-- paginación --}}
    <div>
        {{ $inscriptions->links() }}
    </div>
</div>
