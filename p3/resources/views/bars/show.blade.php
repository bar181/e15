@extends('layouts/main')

@section('title')
    BAR {{ $bar->name }}
@endsection

@section('content')
    <div class="w-full flex justify-between p-5">
        <div>
            <a href='/' class='text-white bg-green-500 hover:bg-green-700  px-2 py-1 text-center'>
                <i class="fa fa-home pr-2"></i>Back</a>
        </div>
        @if ($isEdit)
            <div>
                <a href='/bars/{{ $bar->slug }}/edit' test='show-edit-link'
                    class='text-white bg-orange-500 hover:bg-orange-700  px-2 py-1 text-center'>
                    <i class="fa fa-edit pr-2"></i>Edit</a>
            </div>
        @endif
    </div>

    <div class="grid justify-center w-full  px-4 py-8 bg-white text-white">
        <div class="relative w-full pt-[50px] md:w-[860px] xl:w-[1120px] md:aspect-[2/1] rounded-2xl text-grey-200 bg-gray-900"
            style="min-height:320px">

            <div class=" md:flex items-center justify-center w-full">
                <div class="w-full px-3 text-center ">
                    <div class="text-left p-3 absolute bottom-0 left-0">Brief and Readable</div>
                    @if ($bar->share)
                        <div class="text-right p-3 absolute bottom-0 right-0">Shareable</div>
                    @endif

                    <div class="font-bold  text-center text-xl md:text-5xl w-full">{{ $bar->name }}</div>
                    <div class="font-bold py-5 text-center text-xl md:text-3xl w-full">Topic: {{ $bar->topic }}</div>
                    <div class="font-bold py-5 text-center text-xl md:text-5xl w-full">
                        <hr>
                    </div>
                    <div class="font-bold text-center text-xl md:text-xl w-full">Created by: {{ $bar->user->name }}
                    </div>
                    <div class="font-bold text-center text-xl md:text-xl w-full">{{ $bar->updated_at->format('Y-m-d') }}
                    </div>

                </div>
            </div>
        </div>

        <div class="pb-8 md:w-[860px] xl:w-[1120px] w-full mt-5">
            <div class="w-full  md:aspect-[2/1] rounded-2xl text-grey-200 bg-gray-900">

                <div class="md:flex w-full">
                    <div class="relative flex w-full md:w-1/2 rounded-2xl items-center justify-center aspect-w-1 aspect-h-1"
                        style="min-height:320px">
                        <div class="w-full px-3 text-center ">
                            <div class="text-left p-3 absolute bottom-0 left-0">Brief and Readable by {{ $bar->user->name }}
                            </div>
                            <div class="font-bold py-5 text-center text-xl md:text-2xl w-full">{{ $bar->name }}</div>
                            <div class="text-left text-xl md:text-xl w-full">{{ $bar->content1 }}</div>

                        </div>
                    </div>
                    <div class="flex w-full md:w-1/2 rounded-2xl ">
                        <img class="inset-0 w-full mx-auto rounded-2xl" src="{{ $bar->image1->src }}" alt="report image" />
                    </div>
                </div>
            </div>
        </div>

        <div class="pb-8 md:w-[860px] xl:w-[1120px] w-full mt-5">
            <div class="w-full  md:aspect-[2/1] rounded-2xl text-grey-200 bg-gray-900">

                <div class="md:flex w-full">
                    <div class="relative flex w-full md:w-1/2 rounded-2xl items-center justify-center aspect-w-1 aspect-h-1"
                        style="min-height:320px">
                        <div class="w-full px-3 text-center ">
                            <div class="text-left p-3 absolute bottom-0 left-0">Brief and Readable by
                                {{ $bar->user->name }}</div>
                            <div class="font-bold py-5 text-center text-xl md:text-2xl w-full">{{ $bar->name }}</div>
                            <div class="text-left text-xl md:text-xl w-full">{{ $bar->content2 }}</div>

                        </div>
                    </div>
                    <div class="flex w-full md:w-1/2 rounded-2xl ">
                        <img class="inset-0 w-full mx-auto rounded-2xl" src="{{ $bar->image2->src }}" alt="report image" />
                    </div>
                </div>
            </div>
        </div>

        <div class="pb-8 md:w-[860px] xl:w-[1120px] w-full mt-5">
            <div class="w-full  md:aspect-[2/1] rounded-2xl text-grey-200 bg-gray-900">

                <div class="md:flex w-full">
                    <div class="relative flex w-full md:w-1/2 rounded-2xl items-center justify-center aspect-w-1 aspect-h-1"
                        style="min-height:320px">
                        <div class="w-full px-3 text-center ">
                            <div class="text-left p-3 absolute bottom-0 left-0">Brief and Readable by
                                {{ $bar->user->name }}</div>
                            <div class="font-bold py-5 text-center text-xl md:text-2xl w-full">{{ $bar->name }}</div>
                            <div class="text-left text-xl md:text-xl w-full">{{ $bar->content3 }}</div>

                        </div>
                    </div>
                    <div class="flex w-full md:w-1/2 rounded-2xl ">
                        <img class="inset-0 w-full mx-auto rounded-2xl" src="{{ $bar->image3->src }}" alt="report image" />
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
