@extends('layout.main')
@section('main')
<div class="max-w-screen-lg flex justify-center items-center mx-auto">
    <div class="w-full border rounded-xl shadow py-8 px-8">

        <ul class="w-full divide-y divide-gray-200 dark:divide-gray-700">
            @foreach ($allQrCode as $key => $value)
            <li class="pb-3 sm:pb-4">
                <div class="flex items-center space-x-4 rtl:space-x-reverse">
                    <div class="flex-shrink-0">
                        <div class="py-3">
                            {!! $value->qrCode !!}
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            {{ $value->shortened_url}}
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            {{$value->original_url}}
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white gap-2">

                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Genaret</a>

                        <a href="#" class="font-medium text-red-600 dark:text-blue-500 hover:underline">Delete</a>

                    </div>
                </div>
            </li>
            @endforeach
        </ul>

    </div>
</div>
@endsection