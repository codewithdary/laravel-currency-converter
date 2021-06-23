@extends('layouts.app')

@section('content')

<div class="min-w-screen min-h-screen bg-gray-100 flex flex-col items-center justify-center">
    <div class="w-5/6 lg:w-3/6 rounded-xl bg-gradient-to-b shadow-xl">
        <div class="text-white py-4 bg-gray-200">
            <div class="text-center font-bold text-2xl text-blue-600">
                <h2>
                    <i class="fab fa-gg"></i>
                    Convert
                </h2>
            </div>

            <form action="/convert" method="POST">
                @csrf

                <div class="px-4 py-12 text-white">
                    <div class="flex items-centr justify-between mb-5">
                        <div class="flex flex-col font-bold w-2/6 px-2">
                            <label for="amount" class="mb-3 text-black">
                                Amount
                            </label>
                            <input 
                                value="{{ @session('amount') }}"
                                type="text"
                                name="amount"
                                placeholder="1.00"
                                class="py-3 px-5 rounded focus:outline-none text-gray-600 focus:text-gray-600 border border-4">
                        </div>

                        <div class="flex flex-col font-bold w-4/6 px-2">
                            <label for="from" class="mb-3 text-black">
                                From
                            </label>
                            <select 
                                class="py-3 px-5 rounded focus:outline-none text-gray-600 focus:text-gray-600 border border-4"
                                name="from">
                                @foreach ($codes as $code => $value)
                                    <option class="py-1" {{ $code == @session('from') || $code == 'EUR' ? 'selected' : '' }}>
                                        {{ $code }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex flex-col font-bold w-4/6 px-2">
                            <label for="to" class="mb-3 text-black">
                                To
                            </label>
                            <select 
                                class="py-3 px-5 rounded focus:outline-none text-gray-600 focus:text-gray-600 border border-4"
                                name="to">
                                @foreach ($codes as $code => $value)
                                    <option class="py-1" {{ $code == @session('to') ||$code == 'USD' ? 'selected' : '' }}>
                                        {{ $code }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="float-right text-right">
                            <button type="submit" class="bg-blue-600 border font-bold mt-6 py-4 px-5 rounded-xl transition-all hover:bg-blue-500">
                                Convert
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if (session('conversion'))
        <div class="text-gray-500 text-center pt-12 font-bold text-5xl w-4/5 mx-auto">
            {{ session('conversion') }}
        </div>
    @elseif ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="text-red-500 text-center pt-12 font-bold text-5xl w-4/5 mx-auto">
                {{ $error }}
            </div>
        @endforeach
    @endif
</div>

@endsection