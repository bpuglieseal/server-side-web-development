<tr class="bg-neutral-primary border-b border-default">
    <th scope="row" class="px-6 py-4 font-bold text-heading whitespace-nowrap">
        {{ $car->user->name }}
    </th>
    <td class="px-6 py-4">
        {{ $car->plate }}
    </td>
    <td class="px-6 py-4">
        {{ $car->brand }}
    </td>
    <td class="px-6 py-4">
        {{ $car->model }}
    </td>
    <td class="px-6 py-4">
        <form class="flex flex-row" action="{{ url('/' . $car->id) }}" method="POST">
            @csrf
            @method("DELETE")
            <button type="submit"
                class="inline-flex items-center justify-center gap-0.5 text-white bg-danger box-border border border-transparent hover:bg-danger-strong focus:ring-4 focus:ring-danger-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                <svg class="w-6 h-6 text-inherit dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                </svg>
                Delete
            </button>
        </form>
    </td>
</tr>