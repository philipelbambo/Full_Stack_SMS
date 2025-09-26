<x-app-layout>

    <x-slot name="return">{"link": "/__/list", "text": "Manage"}</x-slot>
    <x-slot name="title">Manage __</x-slot>
    <x-slot name="url_1">{"link": "/__/list", "text": "Manage __"}</x-slot>
    <x-slot name="active">__</x-slot>

    <div class="grid grid-cols-12 gap-x-5">
        <div class="xl:col-span-12 col-span-12">
            <div class="box shadow-none border custom-box">
                <div class="box-body overflow-y-auto">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                        <div>
                            <h6 class="font-bold text-2xl text-gray-700 dark:text-white">
                                <strong>Manage __</strong>
                            </h6>
                            <span class="text-sm text-gray-600 dark:text-gray-300">
                                you can monitor your __ here.
                            </span>
                        </div>
                        <div class="inline-flex items-center gap-2">
                            <a href="/project/list/register"
                                class="inline-flex items-center gap-2 rounded-md border bg-white border-slate-300 px-3 py-2 text-sm font-medium text-slate-700 hover:bg-gray-500">
                                <i class="bi bi-plus-lg"></i> New
                            </a>
                        </div>
                    </div>
                    <hr class="mb-3 !mt-3">
                    
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
