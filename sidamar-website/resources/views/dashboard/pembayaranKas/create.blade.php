@extends('dashboard.layouts.main')

@section('container')

<div class="p-4 ml-64 max-w-5xl">
    <h1 class="text-4xl font-semibold font-montserrat">Buat Pembayaran Kas</h1>
    <hr class="bg-slate-200 mt-5 max-w-3xl">
      <form action="/dashboard/pembayaranKas/{{ $bulanKasId }}" method="post" class="max-w-3xl mt-8 mb-8 font-montserrat" enctype="multipart/form-data">
        @csrf
        @method('POST')
                
        {{-- Input Bulan type dropdown with cool tailwind style --}}
        <div class="mb-4">
            <label for="nama" class="block text-gray-700 text-lg font-bold mb-2">Nama</label>
            <input type="text" name="nama" class="h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-5" value="{{ auth()->user()->name }}" readonly disabled>

            @error('nama')
                <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
            @enderror

            {{-- <label for="bulan" class="block text-gray-700 text-lg font-bold mb-2">Bulan</label> --}}
            <input type="text" name="bulan" class="hidden h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-5" value="{{ $bulanKasId }}">


            <label for="metode" class="block text-gray-700 text-lg font-bold mb-2">Metode Pembayaran</label>
            <select name="metode" id="metode" class="h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-5">
                {{-- get the old value --}}
                <option value="">Pilih Metode Pembayaran</option>
                {{-- select old value jika ada --}}
                <option value="Cash" {{ old('metode') == 'Cash' ? 'selected' : '' }}>Cash</option>
                <option value="DANA" {{ old('metode') == 'DANA' ? 'selected' : '' }}>DANA</option>
                <option value="Go-Pay" {{ old('metode') == 'Go-Pay' ? 'selected' : '' }}>Go-Pay</option>
                <option value="BCA" {{ old('metode') == 'BCA' ? 'selected' : '' }}>BCA</option>
                <option value="BNI" {{ old('metode') == 'BNI' ? 'selected' : '' }}>BNI</option>
                <option value="BRI" {{ old('metode') == 'BRI' ? 'selected' : '' }}>BRI</option>
                <option value="Mandiri" {{ old('metode') == 'Mandiri' ? 'selected' : '' }}>Mandiri</option>
            </select>
            {{-- this field must fill --}}
            @error('metode')
                <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
            @enderror

            <label for="bukti" class="block text-gray-700 text-lg font-bold mb-2">Bukti Pembayaran</label>
            <input type="file" name="bukti" class="h-15 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-5">

            @error('bukti')
                <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
            @enderror


            
          </form>
          
          
          <div class="flex justify-end max-w-full">
              <a href="/dashboard/pembayaranKas" class="bg-gray-500 hover:bg-gray-700 text-white font-bold p-3 rounded-lg mt-5 mr-3">Kembali</a>
              <button type="submit" class="bg-primary hover:bg-red-700 text-white font-bold p-3 rounded-lg mt-5">Buat Pembayaran</button>
          </div>

          {{-- every input must be unique --}}
          @if (session()->has('error'))
              <div class="text-red-500 text-sm mt-2">{{ session('error') }}</div>
          @endif

          {{-- success message --}}
          @if (session()->has('success'))
              <div class="text-green-500 text-sm mt-2">{{ session('success') }}</div>
          @endif

</div>
@endsection