<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>Gerencaidor de atletas<h1>
                            @foreach (Auth::user()->myAtleta as $atleta)
                            <div class="flex justify-between border-b mb-2 gap-2
                        hover::bg-gray-300" x-data="{showDelete: false, showEdit: false}">
                                <div class="flex justify-between flex-grow">
                                    <div>{{$atleta->nome}}</div>
                                    <div>{{$atleta->modalidade}}</div>
                                    <div>{{$atleta->idade}}</div>
                                    <div>{{$atleta->altura}}</div>
                                    <div>{{$atleta->peso}}</div>
                                </div>
                                <div class="flex gap-2">
                                    <div>
                                        <span class="cursor-pointer px-2 bg-red-500 text-white mr-2" @click="showDelete = true">Delete</span>
                                    </div>
                                    <div>
                                        <span class="cursor-pointer px-2 bg-blue-500 text-white" @click="showEdit = true">Edit</span>
                                    </div>
                                </div>
                                <template x-if="showDelete">
                                    <div class="fixed top-0 bottom-0 left-0 right-0 bg-gray-800 bg-opacity-20 z-50">
                                        <div class="w-96 bg-white p-4 absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50">
                                            <h2 class="text-xl font-bold text-center">Are you sure?</h2>
                                            <div class="flex justify-between mt-4">
                                                <form action="{{ route('atleta.destroy', $atleta) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-danger-button>Delete anyway</x-danger-button>
                                                </form>
                                                <x-primary-button @click="showDelete = false">Cancel</x-primary-button>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                                <template x-if="showEdit">
                                    <div class="absolute top-0 bottom-0 left-0 right-0 bg-gray-800 bg-opacity-20 z-0">
                                        <div class="w-96 bg-white p-4 absolute left-1/4 right-1/4 top-1/4 z-10">
                                            <h2 class="text-xl font-bold text-center">{{$atleta->nome}}</h2>
                                            <h2 class="text-xl font-bold text-center">{{$atleta->modalidade}}</h2>
                                            <h2 class="text-xl font-bold text-center">{{$atleta->idade}}</h2>
                                            <h2 class="text-xl font-bold text-center">{{$atleta->altura}}</h2>
                                            <h2 class="text-xl font-bold text-center">{{$atleta->peso}}</h2>
                                            <form class="my-4" action="{{ route('atleta.update', $atleta) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <x-text-input type="text" name="nome" placeholder="nome" :value="$atleta->nome" />
                                                <x-text-input type="text" name="modalidade" placeholder="modalidade" :value="$atleta->modalidade" />
                                                <x-text-input type="number" name="idade" placeholder="idade" :value="$atleta->idade" />
                                                <x-text-input type="number" name="altura" placeholder="altura" step="0.01" :value="$atleta->altura" />
                                                <x-text-input type="number" name="peso" placeholder="peso" step="0.01" :value="$atleta->peso" />
                                                <x-primary-button class="w-full text-center mt-2">Save</x-primary-button>
                                            </form>
                                            <x-danger-button @click="showEdit = false" class="w-full">Cancel</x-danger-button>
                                        </div>
                                    </div>
                                </template>
                            </div>
                            @endforeach

                            <form action="{{route('atleta.store')}}" method="POST">
                                @csrf
                                <x-text-input name="nome" placeholder="nome" />
                                <x-text-input name="modalidade" placeholder="modalidade" />
                                <x-text-input name="idade" placeholder="idade" />
                                <x-text-input name="altura" placeholder="altura" />
                                <x-text-input name="peso" placeholder="peso" />
                                <x-primary-button>Save</x-primary-button>
                            </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>